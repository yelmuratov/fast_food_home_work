<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'user_id',
        'department_id',
        'salary_type',
        'salary_amount',
        'bonus',
        'salary_date',
        'start_time',
        'end_time',
        'overall_work',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    public function checks($date)
    {
        // dd($this->attendances()->where('date', Carbon::parse($date))->first());
        return $this->attendances()->where('date', Carbon::parse($date))->first();
    }
}
