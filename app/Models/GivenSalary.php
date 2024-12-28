<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GivenSalary extends Model
{
    protected $fillable = [
        'employee_id',
        'given_salary_type',
        'given_date',
        'salary_amount',
        'given_amount',
        'remaining_amount'
    ];
}
