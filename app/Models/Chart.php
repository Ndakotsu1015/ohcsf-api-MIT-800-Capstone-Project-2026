<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chart extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'chart_title',
        'chart_type_id',
        'chart_category_id',
        'sql_query',
        'sql_query2',
        'isActive',
        'module_id',
        'filterColumn',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'chart_type_id' => 'integer',
        'chart_category_id' => 'integer',
        'isActive' => 'boolean',
        'module_id' => 'integer',
        'deleted_at' => 'datetime',
    ];

    public function dashboardSettings()
    {
        return $this->hasMany(DashboardSetting::class);
    }

    public function chartType()
    {
        return $this->belongsTo(ChartType::class);
    }

    public function chartCategory()
    {
        return $this->belongsTo(ChartCategory::class);
    }
}