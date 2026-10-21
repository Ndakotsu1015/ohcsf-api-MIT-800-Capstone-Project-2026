<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeploymentStoreRequest;
use App\Http\Requests\DeploymentUpdateRequest;
use App\Http\Resources\DeploymentCollection;
use App\Http\Resources\DeploymentResource;
use App\Http\Resources\EmployeeResource;
use App\Models\Deployment;
use App\Models\Employee;
use App\Models\Designation;
use App\Models\RedeploymentRequests;
use App\Models\Unit;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Mail\DeploymentNotificationMail;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class DeploymentController extends Controller
{
    public function index(Request $request): mixed
    {
        // Start the query with Deployment model
        $query = Deployment::with(['employee', 'unit', 'designation', 'employee.lga', 'unit.division', 'unit.division.department', 'unit.division.department.branch', 'unit.division.department.branch.ministry','cadre', 'unit.division.department.branch.agency', 'unit.division.department.branch.agency.ministry']);

        //Filter by grade_level,
        if ($request->filled('grade_level')) {
            $query->where('grade_level', $request->grade_level);
        }
        //BY MDAs,
        if ($request->filled('mda_id')) {
            //units belongs to divisions that belongs to the department that belongs to the branch that belongs to the agency that belongs to the MDA
            $query->whereHas('unit', function ($query) use ($request) {
                $query->whereHas('division', function ($query) use ($request) {
                    $query->whereHas('department', function ($query) use ($request) {
                        $query->whereHas('branch', function ($query) use ($request) {
                            $query->where('source', 'Ministry');

                            $query->where('relation_id', $request->mda_id);

                        });

                    });
                });
            });
        }

        //By Agency
        if ($request->filled('agency_id')) {
            //units belongs to divisions that belongs to the department that belongs to the branch that belongs to the agency
            $query->whereHas('unit', function ($query) use ($request) {
                $query->whereHas('division', function ($query) use ($request) {
                    $query->whereHas('department', function ($query) use ($request) {
                        $query->whereHas('branch', function ($query) use ($request) {
                            $query->where('source', 'Agency');

                            $query->where('relation_id', $request->agency_id);

                        });

                    });
                });
            });
        }

        //BY Cadre,
        if ($request->filled('cadre')) {
            $filter = ucfirst(strtolower($request->cadre));
            $query->where('cadre', $filter);
        }
        //Department,
        if ($request->filled('department_id')) {
            //units belongs to divisions that belongs to the department
            $query->whereHas('unit', function ($query) use ($request) {
                $query->whereHas('division', function ($query) use ($request) {
                    $query->where('department_id', $request->department_id);
                });
            });
        }
        //gender,
        if ($request->filled('gender')) {
            $filter = ucfirst(strtolower($request->gender));
            $query->whereHas('employee', function ($query) use ($filter) {
                $query->where('gender', $filter);
            });
        }

        //branch,
        if ($request->filled('branch_id')) {
            //units belongs to divisions that belongs to the department that belongs to the branch
            $query->whereHas('unit', function ($query) use ($request) {
                $query->whereHas('division', function ($query) use ($request) {
                    $query->whereHas('department', function ($query) use ($request) {
                        $query->where('branch_id', $request->branch_id);
                    });
                });
            });
        }

        //division
        if ($request->filled('division_id')) {
            //units belongs to divisions
            $query->whereHas('unit', function ($query) use ($request) {
                $query->where('division_id', $request->division_id);
            });
        }
        //unit_id,
        if ($request->filled('unit_id')) {
            $query->where('unit_id', $request->unit_id);
        }

        //by lga_id,
        if ($request->filled('lga_id')) {
            $query->whereHas('employee', function ($query) use ($request) {
                $query->where('lga_id', $request->lga_id);
            });
        }

        //designation_id,
        if ($request->filled('designation_id')) {
            $query->where('designation_id', $request->designation_id);
        }


        //Search by IPPIS no,  full name, employee_no,
        if ($request->filled('search')) {
            $search = $request->search;
            $query->whereHas('employee', function ($query) use ($search) {
                $query->where('IPPIS_no', 'like', "%$search%")
                    ->orWhere('employee_no', 'like', "%$search%")
                    ->orWhere('first_name', 'like', "%$search%")
                    ->orWhere('middle_name', 'like', "%$search%")
                    ->orWhere('last_name', 'like', "%$search%");
            });
        }

        // Get all deployments
        $deployments = collect($query->get());

        $group_deployments = $deployments->groupBy('employee_id');


        // Return results as a DeploymentCollection
        return response()->json(['data' => $group_deployments]);
        // return new DeploymentCollection($deployments);
    }

    public function getProposedList()
    {
        $staffList = $this->getStaffForRedeployment();
        return response()->json(['data' => $staffList]);
    }



    public function store(DeploymentStoreRequest $request): mixed
    {
        Log::alert('DeploymentStoreRequest', $request->validated());
        // Validate the request data
        $validatedData = $request->validated();

        // Create a new employee record in the database
        if (!isset($validatedData['employee_id'])) {
            $employee = Employee::create([
                'passport_file' => $validatedData['passport_file'],
                'title' => $validatedData['title'],
                'first_name' => $validatedData['first_name'],
                'middle_name' => $validatedData['middle_name'],
                'last_name' => $validatedData['last_name'],
                'date_of_birth' => $validatedData['date_of_birth'],
                'gender' => $validatedData['gender'],
                'marital_status' => $validatedData['marital_status'],
                'residential_address' => $validatedData['residential_address'],
                'permanent_address' => $validatedData['permanent_address'],
                'phone_number' => $validatedData['phone_number'],
                'nationality' => $validatedData['nationality'],
                'nin' => $validatedData['nin'],
                'lga_id' => $validatedData['lga_id'],
                'email_address' => $validatedData['email_address'],
                'ippis_no' => $validatedData['ippis_no'],
                'employee_no' => $validatedData['employee_no'],
            ]);
        } else {
            $employee = Employee::findOrFail($validatedData['employee_id']);
        }

        // Create deployment with validated data
        $deployment = Deployment::create([
            'designation_id' => $request->designation_id,
            'unit_id' => $request->unit_id,
            'division_id' => $request->division_id,
            'department_id' => $request->department_id,
            'branch_id' => $request->branch_id,
            'agency_id' => $request->agency_id,
            'ministry_id' => $request->ministry_id,
            'employee_id' => $employee->id, // Only validate if passed
            //2 weeks from now()
            'expected_assumption_date' => now()->addWeeks(2),
            'assumption_date' => $request->assumption_date,
            'cadre_id' => $request->cadre_id,
            'grade_level_id' => $request->grade_level_id,
            'qualification' => $request->qualification ? json_encode($request->qualification) : null,
            'certification' => $request->certification ? json_encode($request->certification) : null,
            'is_redeployed' => $request->is_redeployed ?? false,
            'request_type' => $request->request_type ?? "None",
            'reason' => $request->reason,
            'request_letter_file' => $request->request_letter_file,
            'status' => $request->status ?? "Pending",
            //save approved by as the authenticated user
            'approved_by' => Auth::id(),
        ]);


        // Generate PDF
        $pdf = Pdf::loadView('pdfs.deployment-details', compact('employee', 'deployment'));
        $pdfPath = storage_path("app/public/deployment_details_{$employee->id}.pdf");
        $pdf->save($pdfPath);

        // Send Email with PDF Attachment
        Mail::to($employee->email_address)->send(new DeploymentNotificationMail($employee, $deployment, $pdfPath));


        //return the list of all deployments as a resource
        $deployment = Deployment::with(['employee', 'unit', 'division', 'department', 'branch', 'agency', 'ministry', 'designation', 'employee.lga'])->find($deployment->id);

        return  new DeploymentResource($deployment);
    }

    public function show(Request $request, Deployment $deployment): DeploymentResource
    {
        $deployment = Deployment::with(['employee', 'unit', 'unit.division', 'designation', 'unit.division.department', 'unit.division.department.branch', 'unit.division.department.branch.ministry', 'unit.division.department.branch.agency', 'unit.division.department.branch.agency.ministry', 'employee.lga','cadre', 'gradeLevel'])->find($deployment->id);
        return new DeploymentResource($deployment);
    }
    public function approveMultipleRequests(Request $request)
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'request_ids' => 'required|array',
            'request_ids.*.unit_id' => 'required|exists:units,id',
            'request_ids.*.employee_id' => 'required|exists:employees,id',
            'request_ids.*.deployment_id' => 'required|exists:deployments,id',
        ]);
        Log::alert("validatedrequest", $validatedData);

        $user = Auth::user();
        $requestIds = collect($validatedData['request_ids'])->pluck('deployment_id');

        $deployments = Deployment::whereIn('id', $requestIds)->where('status', 'Pending')->get();


        // If no pending requests found, return early
        if ($deployments->isEmpty()) {
            return response()->json([
                'message' => 'No pending redeployment requests found for the given deployment IDs.',
            ], 404);
        }

        DB::beginTransaction();
        try {
            // Update all requests in one query for efficiency
            Deployment::whereIn('id', $deployments->pluck('id'))
                ->update([
                    'status' => 'Approved',
                    'approved_by' => $user->id,
                    // 'approved_at' => now(),
                ]);


            DB::commit();

            return response()->json([
                'message' => 'Requests approved successfully.',
            ], 200);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => 'An error occurred while approving the requests.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }


    public function update(DeploymentUpdateRequest $request, $id)
    {

        $validated = $request->validated();
        $deployment = Deployment::where('id', $id)->update([
            'designation_id' => $validated['designation_id'],
            'unit_id' => $validated['unit_id'],
            //2 weeks from now()
            'cadre_id' => $validated['cadre_id'],
            'grade_level_id' => $validated['grade_level_id'],
            'qualification' => $validated['qualification'] ? json_encode($validated['qualification']) : null,
            'certification' => $validated['certification'] ? json_encode($validated['certification']) : null,
            'is_redeployed' => $validated['is_redeployed'] ?? false,
        ] );
        $employeeID= $validated['employee_id'];
        if ($validated['employee_id']) {
            $employee = Employee::where('id', $employeeID)->update([
                'passport_file' => $validated['passport_file'],
                'title' => $validated['title'],
                'first_name' => $validated['first_name'],
                'middle_name' => $validated['middle_name'],
                'last_name' => $validated['last_name'],
                'date_of_birth' => $validated['date_of_birth'],
                'gender' => $validated['gender'],
                'marital_status' => $validated['marital_status'],
                'residential_address' => $validated['residential_address'],
                'permanent_address' => $validated['permanent_address'],
                'phone_number' => $validated['phone_number'],
                'nationality' => $validated['nationality'],
                'nin' => $validated['nin'],
                'lga_id' => $validated['lga_id'],
                'email_address' => $validated['email_address'],
                'ippis_no' => $validated['ippis_no'],
                'employee_no' => $validated['employee_no'],
            ]);
        }

        log::info('Deployment');
        log::info($deployment);
        // $deployment->update($request->validated());

        return new DeploymentResource(Deployment::find($id));
    }

    public function destroy(Request $request, Deployment $deployment): Response
    {
        $deployment->delete();

        return response()->noContent();
    }


    function getStaffForRedeployment()
    {
        $redeploymentList = Deployment::select('deployments.*')
            ->join(DB::raw("(SELECT employee_id, MAX(assumption_date) as latest_assumption FROM deployments GROUP BY employee_id) as latest_deployments"), function ($join) {
                $join->on('deployments.employee_id', '=', 'latest_deployments.employee_id')
                    ->on('deployments.assumption_date', '=', 'latest_deployments.latest_assumption');
            })
            ->where(function ($query) {
                $query->where(function ($q) {
                    $q->where('assumption_date', '<=', Carbon::now()->subYears(3))
                        ->where('grade_level_id', '<', 15);
                })
                    ->orWhere(function ($q) {
                        $q->where('assumption_date', '<=', Carbon::now()->subYears(8))
                            ->where('grade_level_id', '>=', 15);
                    });
            })
            ->where('status', 'Pending')
            ->orWhereIn('deployments.employee_id', function ($subQuery) {
                $subQuery->select('employee_id')
                    ->from('redeployment_requests')
                    ->where('status', 'Approved')
                    ->where('created_at', '>=', Carbon::now()->subMonths(3));
            })
            ->with([
                'employee',
                'unit',
                'division',
                'department',
                'branch',
                'agency',
                'ministry',
                'cadre',
                'gradeLevel',
                'designation',
                'unit.division',
                'unit.division.department',
                'unit.division.department.branch',
                'unit.division.department.branch.ministry',
                'unit.division.department.branch.agency',
                'unit.division.department.branch.agency.ministry',
                'employee.lga'
            ])
            ->get();

        // Fetch units with nested relationships
        $units = Cache::remember('units', 3600, function () {
            return Unit::with([
                'division',
                'division.department',
                'division.department.branch',
                'division.department.branch.ministry',
                'division.department.branch.agency',
                'division.department.branch.agency.ministry',
            ])->get();
        });

        $shuffledUnits = $units->shuffle();
        $index = 0;
    // Fetch designation mapping from database
    $designationMapping = Designation::all()->groupBy('cadre')->map(function ($designations) {
        return $designations->pluck('title', 'grade_level')->toArray();
    })->toArray();

        // Assign proposed_unit_id and pre-loaded relationships
        $redeploymentList->each(function ($deployment) use ($shuffledUnits, &$index, $designationMapping) {
            $unit = $shuffledUnits[$index % $shuffledUnits->count()];
            $deployment->proposed_unit_id = $unit->id;
            $deployment->load(['proposedUnit', 'proposedUnit.division', 'proposedUnit.division.designations', 'proposedUnit.division.department', 'proposedUnit.division.department.branch', 'proposedUnit.division.department.branch.agency', 'proposedUnit.division.department.branch.agency.ministry']);

            // Retrieve cadre and grade level
        $cadre = $deployment->cadre_id ?? 'Unknown';
        $gradeLevel = $deployment->grade_level_id ?? 0;

        // Assign designation if available, else default
        $deployment->designation = $designationMapping[$cadre][$gradeLevel] ?? 'Unknown Designation';
            $index++;
        });

        return $redeploymentList;
    }

    public function getTotalDeployments()
{
    $totalDeployments = Deployment::select('deployments.*')->count();

    return response()->json([
        'total_deployments' => $totalDeployments
    ]);
}

public function getTotalProposedRedeployments()
{
    $totalProposedRedeployments = Deployment::join(DB::raw("(SELECT employee_id, MAX(assumption_date) as latest_assumption
        FROM deployments GROUP BY employee_id) as latest_deployments"),
        function ($join) {
            $join->on('deployments.employee_id', '=', 'latest_deployments.employee_id')
                 ->on('deployments.assumption_date', '=', 'latest_deployments.latest_assumption');
        })
        ->where('status', 'Pending')
        ->where(function ($query) {
            $query->where(function ($q) {
                $q->where('assumption_date', '<=', Carbon::now()->subYears(3))
                   ->where('grade_level_id', '<', 15);
            })
            ->orWhere(function ($q) {
                $q->where('assumption_date', '<=', Carbon::now()->subYears(8))
                   ->where('grade_level_id', '>=', 15);
            })
            ->orWhereIn('deployments.employee_id', function ($subQuery) {
                $subQuery->select('employee_id')
                    ->from('redeployment_requests')
                    ->where('status', 'Approved')
                    ->where('created_at', '>=', Carbon::now()->subMonths(3));
            });
        })
        ->count();

    return response()->json([
        'total_proposed_redeployments' => $totalProposedRedeployments
    ]);
}

public function getTotalRedeployedDeployments() {
    $totalRedeployedDeployments = Deployment::where('is_redeployed', true)->count();

    return response()->json([
        'total_redeployed_deployments' => $totalRedeployedDeployments
    ]);


}

}
