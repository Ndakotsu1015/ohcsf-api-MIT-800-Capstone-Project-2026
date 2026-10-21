<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submodule extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'submodule',
        'module_id',
        'isActive',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'module_id' => 'integer',
        'isActive' => 'boolean',
    ];

    public function dashboardSettings()
    {
        return $this->hasMany(DashboardSetting::class);
    }
}
