<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ChartTypeResource extends JsonResource
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
            'chart_category_id' => $this->chart_category_id,
            'chart_type' => $this->chart_type,
            'deleted_at' => $this->deleted_at,
            'dashboardSettings' => DashboardSettingCollection::make($this->whenLoaded('dashboardSettings')),
        ];
    }
}
