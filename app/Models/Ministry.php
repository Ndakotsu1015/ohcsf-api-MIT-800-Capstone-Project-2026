<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ministry extends Model
{
    use HasFactory;
    protected $table = 'ministries';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];

    /**
     * Get all of the agencies for the Ministry
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function agencies(): HasMany
    {
        return $this->hasMany(Agency::class);
    }

    /**
     * Get all of the branches for the Ministry
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function branches(): HasMany
    {
        return $this->hasMany(Branch::class, 'relation_id')->where('source', 'Ministry');
    }
}
