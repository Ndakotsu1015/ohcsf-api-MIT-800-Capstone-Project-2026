<?php

namespace App\Http\Controllers;
use App\Models\Deployment;
use App\Http\Requests\StoreRedeploymentRequestsRequest;
use App\Http\Resources\RedeploymentRequestsCollection;
use App\Http\Resources\RedeploymentRequestsResource;
use App\Models\RedeploymentRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Log;

class RedeploymentRequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $requests = RedeploymentRequests::with(['unit', 'employee', 'approvedBy', 'employee.lga', 'unit.division', 'unit.division.department', 'unit.division.department.branch', 'unit.division.department.branch.ministry', 'unit.division.department.branch.agency', 'unit.division.department.branch.agency.ministry'])->get();
        return new RedeploymentRequestsCollection($requests);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRedeploymentRequestsRequest $request)
    {
        $data = $request->validated();

        $redeploymentRequest = RedeploymentRequests::create($data);

        return new RedeploymentRequestsResource($redeploymentRequest);
    }

    /**
     * Display the specified resource.
     */
    public function show(RedeploymentRequests $redeploymentRequest)
{
    $redeploymentRequest->load([
        'unit.division.department.branch.agency.ministry',
        'unit.division.department.branch.ministry',
        'employee',
        'employee.lga',
        'employee.deployments' => function($query) {
            $query->with([
                'unit.division.department.branch.agency.ministry',
                'unit.division.department.branch.ministry'
            ]);
        },
        'approvedBy'
    ]);

    return new RedeploymentRequestsResource($redeploymentRequest);
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RedeploymentRequests $redeploymentRequest)
    {
        return new RedeploymentRequestsResource($redeploymentRequest->load(['unit', 'employee', 'approvedBy']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRedeploymentRequestsRequest $request, RedeploymentRequests $redeploymentRequest)
    {
        $data = $request->validated();

        $redeploymentRequest->update($data);

        return new RedeploymentRequestsResource($redeploymentRequest);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RedeploymentRequests $redeploymentRequest)
    {
        $redeploymentRequest->delete();

        return response()->noContent();
    }

    // Method to approve, reject requests

    public function toggleStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Approved,Rejected'
        ]);

        $getRecord = RedeploymentRequests::findOrFail($id);

        // Update the status with the one sent from the frontend
        $getRecord->update(['status' => $request->status]);

        // Determine message based on the new status
        $message = "Redeployment Request Successfully " . ($request->status === "Approved" ? "Approved." : "Rejected.");


        return response()->json([
            'message' => $message,
            'status' => $getRecord->status
        ], 200);
    }

    public function approveMultipleRedeploymentRequests(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'request_ids' => 'required|array',
            'request_ids.*' => 'required|integer|exists:redeployment_requests,id',
            'remarks' => 'nullable|string'
        ]);

        $currentUserId = Auth::id();
        $remarks = $validated['remarks'] ?? null;

        try {
            DB::beginTransaction();

            // Fetch all valid requests in one query
            $redeploymentRequests = RedeploymentRequests::whereIn('id', $validated['request_ids'])
                ->where('status', 'Pending')
                ->get();

            if ($redeploymentRequests->isEmpty()) {
                return response()->json([
                    'success' => false,
                    'message' => 'No pending redeployment requests found to approve'
                ], 400);
            }

            // Update all pending requests in bulk
            $updatedCount = $redeploymentRequests->each(function ($request) use ($currentUserId, $remarks) {
                $request->update([
                    'status' => 'Approved',
                    'approved_by' => $currentUserId,
                    'remarks' => $remarks ?? $request->remarks
                ]);
            })->count();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => "{$updatedCount} redeployment request(s) approved successfully",
                'updated_count' => $updatedCount
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error approving redeployment requests: ' . $e->getMessage(), ['exception' => $e]);

            return response()->json([
                'success' => false,
                'message' => 'Failed to approve redeployment requests',
                'error' => 'An unexpected error occurred. Please try again later.'
            ], 500);
        }
    }


}
