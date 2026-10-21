<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Branch extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'relation_id',
        'source',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];

    public function relation()
    {
        if ($this->source === 'Ministry') {
            return $this->belongsTo(Ministry::class, 'relation_id');
        } elseif ($this->source === 'Agency') {
            return $this->belongsTo(Agency::class, 'relation_id');
        }

        return null;
    }

    /**
     * Get the agency that owns the Branch
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function agency(): BelongsTo
    {
        return $this->belongsTo(Agency::class, 'relation_id');
    }

    /**
     * Get the ministry that owns the Branch
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ministry(): BelongsTo
    {
        return $this->belongsTo(Ministry::class, 'relation_id');
    }

}
