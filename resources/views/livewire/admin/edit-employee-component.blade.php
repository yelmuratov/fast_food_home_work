<div>
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 mt-3">
                        <h2><strong>Employee</strong></h2>
                        <a class="btn btn-primary mt-2 mb-3" href="/employee" wire:navigate>
                            Back
                        </a>
                        <form wire:submit.prevent="updateEmployee">
                            <div class="row mb-3">
                                <div class="col-12 mt-4">
                                    <select class="form-select" wire:model="editUser_id"
                                        {{ count($users) > 0 ? '' : 'disabled' }}>
                                        @forelse ($users as $user)
                                            <option value="{{ $user->id }}"
                                                {{ $user->id == $editUser_id ? 'selected' : '' }}>{{ $user->name }}
                                            </option>
                                        @empty
                                            <option selected>No Users</option>
                                        @endforelse
                                    </select>
                                </div>
                                <div class="col-12 mt-4">
                                    <select class="form-select" wire:model="editDepartment_id"
                                        {{ count($departments) > 0 ? '' : 'disabled' }}>
                                        @forelse ($departments as $department)
                                            <option value="{{ $department->id }}"
                                                {{ $department->id == $editDepartment_id ? 'selected' : '' }}>
                                                {{ $department->name }}</option>
                                        @empty
                                            <option selected>No Departments</option>
                                        @endforelse
                                    </select>
                                </div>
                                <div class="col-12 mt-4">
                                    <select class="form-select" wire:model="editSalary_type">
                                        <option value="fixed">Fixed</option>
                                        <option value="bonus">With Bonus</option>
                                    </select>
                                </div>
                                <div class="col-12 mt-4">
                                    <input type="number" wire:model="editSalary_amount" class="form-control"
                                        placeholder="Salary Amount">
                                </div>
                                <div class="col-12 mt-4">
                                    <input type="number" wire:model="editBonus" class="form-control"
                                        placeholder="Bonus amount">
                                </div>
                                <div class="col-12 mt-4">
                                    <input type="date" wire:model="editSalary_date" class="form-control" id="dateInput">
                                </div>
                                <div class="col-12 mt-4">
                                    <input type="time" wire:model="editStart_time" class="form-control" id="timeInput1">
                                </div>
                                <div class="col-12 mt-4">
                                    <input type="time" wire:model="editEnd_time" class="form-control" id="timeInput2">
                                </div>
                                <div class="col-12 mt-4">
                                    <input type="number" wire:model="editOverall_work" class="form-control"
                                        placeholder="Overall working Hours">
                                </div>
                                <div class="col-1 mt-4">
                                    <button type="submit" class="btn btn-success">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
