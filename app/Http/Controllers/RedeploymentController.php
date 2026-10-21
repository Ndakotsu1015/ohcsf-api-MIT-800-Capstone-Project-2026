<?php

namespace App\Http\Controllers;

use App\Http\Requests\RedeploymentStoreRequest;
use App\Http\Requests\RedeploymentUpdateRequest;
use App\Http\Resources\RedeploymentCollection;
use App\Http\Resources\RedeploymentResource;
use App\Models\Redeployment;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RedeploymentController extends Controller
{
    public function index(Request $request): RedeploymentCollection
    {

        // Start the query with Deployment model
        $query = Redeployment::with(['deployment', 'deployment.employee', 'deployment.unit', 'designation', 'deployment.employee.lga']);

        //Filter by grade_level,
        if ($request->filled('grade_level')) {
            $query->whereHas('deployment', function ($query) use ($request) {
                $query->where('grade_level', $request->grade_level);
            });
        }
        //BY MDAs,
        if ($request->filled('mda_id')) {
            //units belongs to divisions that belongs to the department that belongs to the branch that belongs to the agency that belongs to the MDA

            $query->whereHas('deployment', function ($query) use ($request) {
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
            });
        }

        //By Agency
        if ($request->filled('agency_id')) {
            //units belongs to divisions that belongs to the department that belongs to the branch that belongs to the agency
            $query->whereHas('deployment', function ($query) use ($request) {
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
            });
        }

        //BY Cadre,
        if ($request->filled('cadre')) {
            $filter = ucfirst(strtolower($request->cadre));
            $query->whereHas('deployment', function ($query) use ($filter) {
                $query->where('cadre', $filter);
            });
        }

        //Department,
        if ($request->filled('department_id')) {
            //units belongs to divisions that belongs to the department
            $query->whereHas('deployment', function ($query) use ($request) {
                $query->whereHas('unit', function ($query) use ($request) {
                    $query->whereHas('division', function ($query) use ($request) {
                        $query->where('department_id', $request->department_id);
                    });
                });
            });
        }

        //gender,
        if ($request->filled('gender')) {
            $filter = ucfirst(strtolower($request->gender));
            $query->whereHas('deployment', function ($query) use ($filter) {
                $query->whereHas('employee', function ($query) use ($filter) {
                    $query->where('gender', $filter);
                });
            });
        }

        //branch,
        if ($request->filled('branch_id')) {
            //units belongs to divisions that belongs to the department that belongs to the branch

            $query->whereHas('deployment', function ($query) use ($request) {
                $query->whereHas('unit', function ($query) use ($request) {
                    $query->whereHas('division', function ($query) use ($request) {
                        $query->whereHas('department', function ($query) use ($request) {
                            $query->where('branch_id', $request->branch_id);
                        });
                    });
                });
            });
        }

        //division
        if ($request->filled('division_id')) {
            //units belongs to divisions
            $query->whereHas('deployment', function ($query) use ($request) {
                $query->whereHas('unit', function ($query) use ($request) {
                    $query->where('division_id', $request->division_id);
                });
            });
        }
        //unit_id,
        if ($request->filled('unit_id')) {
            $query->where('unit_id', $request->unit_id);
        }

        //by lga_id,
        if ($request->filled('lga_id')) {
            $query->whereHas('deployment', function ($query) use ($request) {
                $query->whereHas('employee', function ($query) use ($request) {
                    $query->where('lga_id', $request->lga_id);
                });
            });
        }

        //designation_id,
        if ($request->filled('designation_id')) {
            $query->where('designation_id', $request->designation_id);
        }

        // by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        //by request_type
        if ($request->filled('request_type')) {
            $query->where('request_type', $request->request_type);
        }

        // by date range
        if ($request->filled('start_date') && $request->filled('end_date')) {
            $query->whereBetween('created_at', [$request->start_date, $request->end_date]);
        }


        //Search by IPPIS no,  full name, employee_no,
        if ($request->filled('search')) {
            $search = $request->search;
            $query->whereHas('deployment', function ($query) use ($search) {
                $query->whereHas('employee', function ($query) use ($search) {
                    $query->where('IPPIS_no', 'like', "%$search%")
                        ->orWhere('employee_no', 'like', "%$search%")
                        ->orWhere('first_name', 'like', "%$search%")
                        ->orWhere('middle_name', 'like', "%$search%")
                        ->orWhere('last_name', 'like', "%$search%");
                });
            });
        }

        // Get all deployments
        $redeployments = $query->get();

        return new RedeploymentCollection($redeployments);
    }

    public function store(RedeploymentStoreRequest $request): RedeploymentResource
    {
        $redeployment = Redeployment::create($request->validated());

        return new RedeploymentResource($redeployment);
    }

    public function show(Request $request, Redeployment $redeployment): RedeploymentResource
    {
        return new RedeploymentResource($redeployment);
    }

    public function update(RedeploymentUpdateRequest $request, Redeployment $redeployment): RedeploymentResource
    {
        $redeployment->update($request->validated());

        return new RedeploymentResource($redeployment);
    }

    public function destroy(Request $request, Redeployment $redeployment): Response
    {
        $redeployment->delete();

        return response()->noContent();
    }
}
