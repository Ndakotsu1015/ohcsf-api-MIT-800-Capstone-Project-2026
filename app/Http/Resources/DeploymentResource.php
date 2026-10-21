<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DeploymentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'designation' => new DesignationResource($this->whenLoaded('designation')),
            'unit' => new UnitResource($this->whenLoaded('unit')),
            'division' => new DivisionResource($this->whenLoaded('division')),
            'department' => new DepartmentResource($this->whenLoaded('department')),
            'branch' => new BranchResource($this->whenLoaded('branch')),
            'agency' => new AgencyResource($this->whenLoaded('agency')),
            'ministry' => new MinistryResource($this->whenLoaded('ministry')),
            'proposed_unit' => new UnitResource($this->whenLoaded('proposedUnit')),
            'employee' => new EmployeeResource($this->whenLoaded('employee')),
            'expected_assumption_date' => $this->expected_assumption_date,
            'assumption_date' => $this->assumption_date,
            'cadre' => new CadreResource($this->whenLoaded('cadre')),
            'gradeLevel' => new GradeLevelResource($this->whenLoaded('gradeLevel')),
            'qualification' => $this->qualification,
            'certification' => $this->certification,
            'is_redeployed' => $this->is_redeployed,
            'request_type' => $this->request_type,
            'reason' => $this->reason,
            'request_letter_file' => $this->request_letter_file,
            'status' => $this->status,
            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTimeString(),
        ];
    }
}
