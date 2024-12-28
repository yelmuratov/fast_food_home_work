<?php

namespace App\Livewire\Admin;

use App\Models\Employee;
use Carbon\Carbon;
use Livewire\Component;

class AttendanceComponent extends Component
{
    //View variables
    public $date, $employees = [];

    public function mount()
    {
        $this->date = Carbon::now();
        $this->employees = Employee::all();
    }

    public function render()
    {
        $daysInMonth = $this->date->daysInMonth;
        $days = [];
        for ($i = 1; $i <= $daysInMonth; $i++) {
            $days[] = Carbon::create($this->date->year, $this->date->month, $i);
        }
        return view('livewire.admin.attendance-component', ['days' => $days]);
    }

    public function changeDate($date)
    {
        $this->date = Carbon::parse($date);
    }
}
