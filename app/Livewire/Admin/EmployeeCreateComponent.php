<?php

namespace App\Livewire\Admin;

use App\Models\Department;
use App\Models\Employee;
use App\Models\User;
use Livewire\Component;

class EmployeeCreateComponent extends Component
{

    //View variables
    public $users = [], $departments = [], $user_id, $department_id, $salary_type = 'fixed', $salary_amount, $bonus, $salary_date, $start_time, $end_time, $overall_work;

    public function mount()
    {
        $this->getUsersAndDepartments();
    }

    public function getUsersAndDepartments()
    {
        $this->user_id = User::orderBy('id', 'asc')->first()->id;
        $this->department_id = Department::orderBy('id', 'asc')->first()->id;
        $this->users = User::where('role', '!=', 'admin')->get();
        $this->departments = Department::all();
    }

    public function render()
    {
        return view('livewire.admin.employee-create-component');
    }

    public function storeEmployee()
    {
        Employee::create([
            'user_id' => $this->user_id,
            'department_id' => $this->department_id,
            'salary_type' => $this->salary_type,
            'salary_amount' => $this->salary_amount,
            'bonus' => $this->bonus,
            'salary_date' => $this->salary_date,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'overall_work' => $this->overall_work
        ]);

        $this->reset(['user_id', 'department_id', 'salary_type', 'salary_amount', 'bonus', 'salary_date', 'start_time', 'end_time', 'overall_work']);
        return redirect()->to('employee');
    }
}
