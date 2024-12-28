<?php

namespace App\Livewire\Admin;

use App\Models\Attendance;
use App\Models\Employee;
use Carbon\Carbon;
use Livewire\Component;

class AttendanceCreateComponent extends Component
{
    //view variables
    public $start_time, $end_time, $custom_start_time, $custom_end_time,$name, $employee, $date;

    public function mount(Employee $employee, $time) 
    {
        $this->employee = $employee;
        $this->custom_start_time = $employee->start_time;
        $this->custom_end_time = $employee->end_time;
        $this->date = $time;
        $this->name = $employee->user->name;
    }

    public function createAttendance()
    {
        $startTime = Carbon::parse($this->start_time);
        $endTime = Carbon::parse($this->end_time);
        $difference = $startTime->diff($endTime);

        Attendance::create([
            'user_id' => $this->employee->user_id,
            'employee_id' => $this->employee->id,
            'date' => Carbon::parse($this->date),
            'start_time' => $startTime,
            'end_time' => $endTime,
            'overall_time' => sprintf(
                '%02d:%02d:%02d',
                $difference->h,
                $difference->i,
                $difference->s
            )
        ]);
        return redirect()->route('attendance');
    }

    public function render()
    {
        return view('livewire.admin.attendance-create-component');
    }
}
