<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RedeploymentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'unit_id' => new UnitResource($this->unit),
            'designation_id' => new DesignationResource($this->designation),
            'request_type' => $this->request_type,
            'deployment_id' => new DeploymentResource($this->deployment),
            'benefit' => $this->benefit,
            'request_letter_file' => $this->request_letter_file,
            'effective_date' => $this->effective_date,
            'end_date_report' => $this->end_date_report,
            'remarks' => $this->remarks,
            'status' => $this->status,
        ];
    }
}
