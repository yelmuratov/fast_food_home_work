<div>
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 mt-3">
                        <h2><strong>Employee</strong></h2>
                        <a class="btn btn-primary mt-2 mb-3" href="/employee-create" wire:navigate>Create</a>
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Department</th>
                                    <th>Salary Type</th>
                                    <th>Salary Amount</th>
                                    <th>Bonus</th>
                                    <th>Salary Date</th>
                                    <th>Start time</th>
                                    <th>End Time</th>
                                    <th>Overall Work</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($employees as $employee)
                                    <tr>
                                        <td>{{ $employee->id }}</td>
                                        <td>{{ $employee->user->name }}</td>
                                        <td>{{ $employee->department->name }}</td>
                                        <td>{{ $employee->salary_type }}</td>
                                        <td>{{ number_format($employee->salary_amount) }}</td>
                                        <td>{{ $employee->bonus }} %</td>
                                        <td>{{ $employee->salary_date }}</td>
                                        <td>{{ $employee->start_time }}</td>
                                        <td>{{ $employee->end_time }}</td>
                                        <td>{{ $employee->overall_work }}</td>
                                        <td>
                                            <a class="btn btn-warning" wire:navigate href="/employee-edit/{{$employee->id}}">
                                                <i class="bi bi-pencil"></i></a>
                                            <button class="btn btn-danger"
                                                wire:click="deleteEmployee({{ $employee->id }})"><i
                                                    class="bi bi-trash3"></i></button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" style="text-align: center; vertical-align: middle;">No data
                                            available</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
