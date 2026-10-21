<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RedeploymentRequests extends Model
{
    /** @use HasFactory<\Database\Factories\RedeploymentRequestsFactory> */
    use HasFactory;
    protected $fillable = [
        'unit_id',
        'employee_id',
        'reason',
        'request_letter_file',
        'status',
        'request_type',
        'approved_by',
    ];
    /**
     * Relationships
     */
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function approvedBy()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }
}
