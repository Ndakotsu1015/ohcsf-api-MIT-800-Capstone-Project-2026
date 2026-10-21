<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DashboardSetting extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'chart_id',
        'module_id',
        'chart_type_id',
        'chart_category_id',
        'chart_title',
        'is_active',
        'orderby',
        'is_group',
        'sub_module_id',
        'column_width'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'chart_id' => 'integer',
        'module_id' => 'integer',
        'chart_type_id' => 'integer',
        'chart_category_id' => 'integer',
        'is_active' => 'boolean',
        'orderby' => 'integer',
        'is_group' => 'boolean',
        'sub_module_id' => 'integer',
        'column_width'=>'integer'
    ];

    public function chart()
    {
        return $this->belongsTo(Chart::class);
    }

    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    public function chartType()
    {
        return $this->belongsTo(ChartType::class);
    }

    public function chartCategory()
    {
        return $this->belongsTo(ChartCategory::class);
    }

    public function subModule()
    {
        return $this->belongsTo(SubModule::class);
    }
}
