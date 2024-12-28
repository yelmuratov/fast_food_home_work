<?php

namespace App\Livewire\Admin;

use App\Models\Department;
use Livewire\Component;

class DepartmentComponent extends Component
{
    //View variables
    public $createDepartment = false, $departments = [],$name;

    // Edit variables
    public $editDepartment, $editName;

    public function mount()
    {
        $this->allDepartments();
    }

    public function createChange()
    {
        $this->createDepartment = !$this->createDepartment;
    }

    public function allDepartments()
    {
        $this->departments = Department::orderBy('order','asc')->get();
    }

    public function render()
    {
        return view('livewire.admin.department-component');
    }

    public function storeDepartment()
    {
        Department::create([
            'name' => $this->name,
        ]);
        $this->reset(['name','createDepartment']);
        $this->allDepartments();
    }

    public function updateDepartmentOrder($departmentIds)
    {
        foreach ($departmentIds as $departmentId) {
            Department::where('id', $departmentId['value'])->update(['order' => $departmentId['order']]);
        }
        $this->allDepartments();
    }

    public function updateDepartment()
    {
        Department::where('id',$this->editDepartment)->update(['name' => $this->editName]);
        $this->reset(['editDepartment','editName']);
        $this->allDepartments();
    }

    public function editionDepartment(Department $department)
    {
        $this->editDepartment = $department->id;
        $this->editName = $department->name;
        $this->allDepartments();
    }

    public function deleteDepartment(Department $department)
    {
        $department->delete();
        $this->allDepartments();
    }
}
