<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DepartmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'branch_id' => $this->branch_id,
            'branch' => new BranchResource($this->whenLoaded('branch')),
            'divisions' => DivisionCollection::make($this->whenLoaded('divisions')),
        ];
    }
}
