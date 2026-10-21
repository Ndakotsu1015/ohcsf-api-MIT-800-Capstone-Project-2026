<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BranchResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return $this->source == "Agency" ? [
            'id' => $this->id,
            'name' => $this->name,
            'source' => $this->source,
            'relation_id' => $this->relation_id,
            'agency' => new AgencyResource($this->whenLoaded('agency')),
        ] :
            [
                'id' => $this->id,
                'name' => $this->name,
                'source' => $this->source,
                'relation_id' => $this->relation_id,
                'ministry' => new MinistryResource($this->whenLoaded('ministry')),
            ];
    }
}
