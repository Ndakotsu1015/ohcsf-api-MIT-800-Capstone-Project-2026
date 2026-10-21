<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Deployment extends Model
{
    use HasFactory;
    protected $fillable = [
        'designation_id',
        'unit_id',
        'division_id',
        'department_id',
        'branch_id',
        'agency_id',
        'ministry_id',
        'employee_id',
        'expected_assumption_date',
        'assumption_date',
        'cadre_id',
        'grade_level_id',
        'qualification',
        'certification',
        'is_redeployed',
        'request_type',
        'reason',
        'request_letter_file',
        'status',
    ];

    protected $casts = [
        'cadre_id'=> 'integer',
        'expected_assumption_date' => 'datetime',
        'assumption_date' => 'datetime',
        'qualification' => 'array',
        'certification' => 'array',
        'is_redeployed' => 'boolean',
    ];
    public function designation(): BelongsTo
    {
        return $this->belongsTo(Designation::class);
    }

    /**
     * Get all of the redeployments for the Deployment
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function redeployments(): HasMany
    {
        return $this->hasMany(Redeployment::class);
    }

    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class);
    }
    public function division(): BelongsTo
    {
        return $this->belongsTo(Division::class);
    }
    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }
    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }
    public function agency(): BelongsTo
    {
        return $this->belongsTo(Agency::class);
    }
    public function ministry(): BelongsTo
    {
        return $this->belongsTo(Ministry::class);
    }
    public function cadre(): BelongsTo
    {
        return $this->belongsTo(Cadre::class);
    }
    public function gradeLevel(): BelongsTo
    {
        return $this->belongsTo(GradeLevel::class);
    }

    // app/Models/Deployment.php
    public function proposedUnit()
    {
        return $this->belongsTo(Unit::class, 'proposed_unit_id');
    }

    /**
     * Get the employee that owns the Deployment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

    public function approvedBy()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    // app/Models/Deployment.php
    public function getQualificationAttribute($value)
    {
        $cleanedString = json_decode($value);

        $cleanedString = str_replace('\"', "'", $value);
        $cleanedString = trim($cleanedString);
        return json_decode($cleanedString);
    }

    public function getCertificationAttribute($value)
    {
        $cleanedString = json_decode($value);

        $cleanedString = str_replace('\"', "'", $value);
        $cleanedString = trim($cleanedString);
        return json_decode($cleanedString);
    }
}
