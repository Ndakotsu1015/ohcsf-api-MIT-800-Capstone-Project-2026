<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ModuleResource extends JsonResource
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
            'name' => $this->name,
            'order_by' => $this->order_by,
            'active_id' => $this->active_id,
            'is_client_active' => $this->is_client_active,
            'url' => $this->url,
            'client_url' => $this->client_url,
            'icon' => $this->icon,
            'client_icon' => $this->client_icon,
            'summary' => $this->summary,
            'client_summary' => $this->client_summary,
            'bg_class' => $this->bg_class,
            'menus' => MenuResource::collection($this->whenLoaded('menus')),
            'client_activated' => $this->client_activated,
        ];
    }
}
