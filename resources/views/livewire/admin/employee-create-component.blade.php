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
                        <form wire:submit.prevent="storeEmployee">
                            <div class="row mb-3">
                                <div class="col-12 mt-4">
                                    <select class="form-select" wire:model="user_id"
                                        {{ count($users) > 0 ? '' : 'disabled' }}>
                                        @forelse ($users as $user)
                                            @if (!$user->employee)
                                                <option value="{{ $user->id }}"
                                                    {{ $user->id == $user_id ? 'selected' : '' }}>{{ $user->name }}
                                                </option>
                                            @endif
                                        @empty
                                            <option selected>No Users</option>
                                        @endforelse
                                    </select>
                                </div>
                                <div class="col-12 mt-4">
                                    <select class="form-select" wire:model="department_id"
                                        {{ count($departments) > 0 ? '' : 'disabled' }}>
                                        @forelse ($departments as $department)
                                            <option value="{{ $department->id }}"
                                                {{ $department->id == $department_id ? 'selected' : '' }}>
                                                {{ $department->name }}</option>
                                        @empty
                                            <option selected>No Departments</option>
                                        @endforelse
                                    </select>
                                </div>
                                <div class="col-12 mt-4">
                                    <select class="form-select" wire:model="salary_type">
                                        <option value="fixed">Fixed</option>
                                        <option value="bonus">With Bonus</option>
                                    </select>
                                </div>
                                <div class="col-12 mt-4">
                                    <input type="number" wire:model="salary_amount" class="form-control"
                                        placeholder="Salary Amount">
                                </div>
                                <div class="col-12 mt-4">
                                    <input type="number" wire:model="bonus" class="form-control"
                                        placeholder="Bonus amount">
                                </div>
                                <div class="col-12 mt-4">
                                    <input type="date" wire:model="salary_date" class="form-control" id="dateInput">
                                </div>
                                <div class="col-12 mt-4">
                                    <input type="time" wire:model="start_time" class="form-control" id="timeInput1">
                                </div>
                                <div class="col-12 mt-4">
                                    <input type="time" wire:model="end_time" class="form-control" id="timeInput2">
                                </div>
                                <div class="col-12 mt-4">
                                    <input type="number" wire:model="overall_work" class="form-control"
                                        placeholder="Overall working Hours">
                                </div>
                                <div class="col-1 mt-4">
                                    <button type="submit" class="btn btn-success">Create</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
