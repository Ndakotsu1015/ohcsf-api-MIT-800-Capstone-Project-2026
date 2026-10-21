<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Agency extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'ministry_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'ministry_id' => 'integer',
    ];

    public function ministry(): BelongsTo
    {
        return $this->belongsTo(Ministry::class);
    }

    public function agency()
    {
        return $this->hasMany(Agency::class);
    }

    /**
     * Get all of the branches for the Agency
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function branches(): HasMany
    {
        return $this->hasMany(Branch::class, 'relation_id')->where('source', 'Agency');
    }
}
