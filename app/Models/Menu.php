<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'link',
        'order',
        'is_active',
        'icon',
        'parent_id',
        'module_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'is_active' => 'boolean',
        'parent_id' => 'integer',
        'module_id' => 'integer',
    ];

    public function parentMenu()
    {
        return $this->belongsTo(Menu::class, 'parent_id');
    }

    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    public function menuAuthorizations()
    {
        return $this->hasMany(MenuAuthorization::class);
    }
}
