<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PermissionDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'is_active' => $this->is_active,
            'privilege_id' => $this->privilege_id,
            'privilege' => new PrivilegeResource($this->whenLoaded('privilege')),
            'permission_id' => $this->permission_id,
            'permission' => new PermissionResource($this->whenLoaded('permission')),
        ];
    }
}
