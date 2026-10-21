<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Employee extends Model
{
    /** @use HasFactory<\Database\Factories\EmployeeFactory> */
    use HasFactory;

    protected $fillable = [
        'passport_file',
        'title',
        'first_name',
        'middle_name',
        'last_name',
        'date_of_birth',
        'gender',
        'marital_status',
        'residential_address',
        'permanent_address',
        'phone_number',
        'nationality',
        'nin',
        'lga_id',
        'email_address',
        'ippis_no',
        'employee_no',
    ];


    /**
     * Get all of the deployments for the Employee
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function deployments(): HasMany
    {
        return $this->hasMany(Deployment::class);
    }

    /**
     * Get the lga that owns the Employee
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lga(): BelongsTo
    {
        return $this->belongsTo(Lga::class);
    }
}
