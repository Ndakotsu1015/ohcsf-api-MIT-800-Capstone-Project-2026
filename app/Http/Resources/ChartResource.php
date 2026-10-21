<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ChartResource extends JsonResource
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
            'chart_title' => $this->chart_title,
            'chart_type_id' => $this->chart_type_id,
            'chart_category_id' => $this->chart_category_id,
            'sql_query' => $this->sql_query,
            'isActive' => $this->isActive,
            'module_id' => $this->module_id,
            'filterColumn' => $this->filterColumn,
            'deleted_at' => $this->deleted_at,
            'dashboardSettings' => DashboardSettingCollection::make($this->whenLoaded('dashboardSettings')),
        ];
    }
}
