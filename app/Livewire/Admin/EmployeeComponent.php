<?php

namespace App\Livewire\Admin;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;

class EmployeeComponent extends Component
{
    use WithFileUploads;
    //view variables
    public $employees = [];
    public function mount()
    {
        $this->getAllEmployee();
    }

    public function render()
    {
        return view('livewire.admin.employee-component');
    }

    public function getAllEmployee()
    {
        $this->employees = Employee::all();
    }

    public function deleteEmployee(Employee $employee)
    {
        $employee->delete();
        $this->getAllEmployee();
    }
}
