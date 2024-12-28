<?php

namespace App\Livewire\Admin;

use App\Models\Department;
use App\Models\Employee;
use App\Models\User;
use Livewire\Component;

class EditEmployeeComponent extends Component
{
    //view Variables
    public $users = [], $departments = [], $employee, $editUser_id, $editDepartment_id, $editSalary_type, $editSalary_amount, $editBonus, $editSalary_date, $editStart_time, $editEnd_time, $editOverall_work;

    public function mount(Employee $employee)
    {
        $this->employee = $employee;
        $this->users = User::all();
        $this->departments = Department::all();

        $this->editUser_id = $employee->user_id;
        $this->editDepartment_id = $employee->department_id;
        $this->editSalary_type = $employee->salary_type;
        $this->editSalary_amount = $employee->salary_amount;
        $this->editBonus = $employee->bonus;
        $this->editSalary_date = $employee->salary_date;
        $this->editStart_time = $employee->start_time;
        $this->editEnd_time = $employee->end_time;
        $this->editOverall_work = $employee->overall_work;
    }

    public function render()
    {
        return view('livewire.admin.edit-employee-component');
    }

    public function updateEmployee()
    {
        $this->employee->update([
            'user_id' => $this->editUser_id,
            'department_id' => $this->editDepartment_id,
            'salary_type' => $this->editSalary_type,
            'salary_amount' => $this->editSalary_amount,
            'bonus' => $this->editBonus,
            'salary_date' => $this->editSalary_date,
            'start_time' => $this->editStart_time,
            'end_time' => $this->editEnd_time,
            'overall_work' => $this->editOverall_work
        ]);

        $this->reset(['editUser_id', 'editDepartment_id', 'editSalary_type', 'editSalary_amount', 'editBonus', 'editSalary_date', 'editStart_time', 'editEnd_time', 'editOverall_work']);
        return redirect()->to('employee');
    }
}
