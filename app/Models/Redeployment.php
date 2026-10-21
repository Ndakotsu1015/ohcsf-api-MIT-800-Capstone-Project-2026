<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Redeployment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'unit_id',
        'designation_id',
        'request_type',
        'deployment_id',
        'benefit',
        'request_letter_file',
        'effective_date',
        'end_date_report',
        'remarks',
        'status',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'unit_id' => 'integer',
        'designation_id' => 'integer',
        'deployment_id' => 'integer',
        'effective_date' => 'date',
        'end_date_report' => 'date',
    ];

    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class);
    }

    public function designation(): BelongsTo
    {
        return $this->belongsTo(Designation::class);
    }

    public function deployment(): BelongsTo
    {
        return $this->belongsTo(Deployment::class);
    }
}
