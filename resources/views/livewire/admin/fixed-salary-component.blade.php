<div>
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 mt-3">
                        <h2><strong>Fixed Salary</strong></h2>
                        <input type="date" class="form-control mt-3 mb-3" id="dateInput" name=""
                            wire:change="selectDate($event.target.value)">
                        <h4 class="text-primary mt-2 mb-2">Salary of {{ $date->format('F Y') }}</h4>
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Salary amount(custom)</th>
                                    <th>Work hours(custom)</th>
                                    <th>Total Work Hours</th>
                                    <th>Salary amount(For this month)</th>
                                    <th>Given Salary(For this month)</th>
                                    <th>Remaining Salary(For this month)</th>
                                    <th>Give Salary</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($employees as $employee)
                                    <tr>
                                        <td>{{ $employee->id }}</td>
                                        <td>{{ $employee->user->name }}</td>
                                        <td>{{ number_format($employee->salary_amount) }}</td>
                                        <td>{{ $employee->overall_work }}</td>
                                        <td>{{ floor($workTimes[$employee->id]['hours']) }}</td>
                                        <td>{{ number_format($workTimes[$employee->id]['salary']) }} So'm</td>
                                        <td>{{ number_format($workTimes[$employee->id]['givenSalary']) }} So'm</td>
                                        <td>{{ number_format($workTimes[$employee->id]['salary'] - $workTimes[$employee->id]['givenSalary']) }}
                                            So'm</td>
                                        <td>
                                            <a href="/give-salary/{{ $employee->id }}/{{ $workTimes[$employee->id]['salary'] }}/{{ $date->format('Y-m-d') }}"
                                                wire:navigate class="btn btn-primary">Give
                                                Salary</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" align="center"></td>
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
