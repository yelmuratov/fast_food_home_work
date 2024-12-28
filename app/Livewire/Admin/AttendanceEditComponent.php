<?php

namespace App\Livewire\Admin;

use App\Models\Attendance;
use Carbon\Carbon;
use Livewire\Component;

class AttendanceEditComponent extends Component
{

    //view variables
    public $start_time, $end_time, $custom_start_time, $custom_end_time, $name, $id;

    public function mount(Attendance $attendance)
    {
        $this->custom_start_time = $attendance->employee->start_time;
        $this->custom_end_time = $attendance->employee->end_time;
        $this->start_time = $attendance->start_time;
        $this->end_time = $attendance->end_time;
        $this->name = $attendance->user->name;
        $this->id = $attendance->id;
    }

    public function render()
    {
        return view('livewire.admin.attendance-edit-component');
    }

    public function updateAttendance()
    {
        $startTime = Carbon::parse($this->start_time);
        $endTime = Carbon::parse($this->end_time);
        $difference = $startTime->diff($endTime);

        Attendance::where('id', $this->id)->update([
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
}
