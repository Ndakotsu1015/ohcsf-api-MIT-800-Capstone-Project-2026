<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RedeploymentRequestsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'unit' => new UnitResource($this->unit),
            'employee' => new EmployeeResource($this->employee),
            'reason' => $this->reason,
            'request_letter_file' => $this->request_letter_file,
            'status' => $this->status,
            'request_type' => $this->request_type,
            'approved_by' => $this->approvedBy ? new UserResource($this->approvedBy) : null,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
        ];
    }
}
