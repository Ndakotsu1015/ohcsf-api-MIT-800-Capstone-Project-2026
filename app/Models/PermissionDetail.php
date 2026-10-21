<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermissionDetail extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'is_active',
        'permission_id',
        'privilege_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'is_active' => 'boolean',
        'permission_id' => 'integer',
        'privilege_id' => 'integer',
    ];

    public function permission()
    {
        return $this->belongsTo(Permission::class);
    }

    public function privilege()
    {
        return $this->belongsTo(Privilege::class);
    }
}
