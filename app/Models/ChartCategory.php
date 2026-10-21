<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChartCategory extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'chart_provider_id',
        'chart_category',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'chart_provider_id' => 'integer',
        'deleted_at' => 'datetime',
    ];

    public function chartTypes()
    {
        return $this->hasMany(ChartType::class);
    }

    public function dashboardSettings()
    {
        return $this->hasMany(DashboardSetting::class);
    }

    public function chartProvider()
    {
        return $this->belongsTo(ChartProvider::class);
    }
}
