<?php

namespace App\Livewire\Admin;

use App\Models\Employee;
use App\Models\GivenSalary;
use Livewire\Component;

class SalaryComponent extends Component
{
    //view variables
    public $employee, $name, $given_date, $given_amount, $amount, $salaryFor = 'fix';

    public function mount(Employee $employee, $amount, $date)
    {
        // dd($employee,round($amount));
        
        $this->given_date = $date;
        // dd($this->given_date);
        $this->amount =  round($amount);
        $this->name = $employee->user->name;
        $this->employee = $employee;
    }

    public function render()
    {
        return view('livewire.admin.salary-component');
    }

    public function giveSalaryTo()
    {
        GivenSalary::create([
            'employee_id' => $this->employee->id,
            'given_salary_type' => $this->salaryFor,
            'given_date' => $this->given_date,
            'salary_amount' => $this->amount,
            'given_amount' => $this->given_amount,
            'remaining_amount' => ($this->amount - $this->given_amount)
        ]);
        return redirect()->route('fixedSalary');
    }
}
