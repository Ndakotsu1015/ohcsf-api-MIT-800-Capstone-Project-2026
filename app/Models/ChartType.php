<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChartType extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'chart_category_id',
        'chart_type',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'chart_category_id' => 'integer',
        'deleted_at' => 'datetime',
    ];

    public function dashboardSettings()
    {
        return $this->hasMany(DashboardSetting::class);
    }

    public function chartCategory()
    {
        return $this->belongsTo(ChartCategory::class);
    }
}
