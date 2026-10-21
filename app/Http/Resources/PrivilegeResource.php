<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PrivilegeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            // 'permissions' => new PermissionResource($this->whenLoaded('permissions'))
            'permissions' => new PermissionDetailCollection($this->whenLoaded('permissions')),
        ];
    }
}
