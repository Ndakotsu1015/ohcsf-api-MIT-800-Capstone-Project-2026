<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class State extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'geopolitical_zone_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'geopolitical_zone_id' => 'integer',
    ];

    public function lgas(): HasMany
    {
        return $this->hasMany(Lga::class);
    }

    public function geopoliticalZone(): BelongsTo
    {
        return $this->belongsTo(GeopoliticalZone::class);
    }
}
