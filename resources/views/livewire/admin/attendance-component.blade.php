<div>
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 mt-3">
                        <h2><strong>Attendance</strong></h2>
                        <input type="date" class="form-control mt-3 mb-3" id="dateInput" name=""
                            wire:change="changeDate($event.target.value)">
                        <h4 class="text-primary mt-2 mb-2">{{ $date->format('F Y') }}</h4>
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    @foreach ($days as $day)
                                        <th>{{ $day->format('d') }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($employees as $employee)
                                    <tr>
                                        <td>{{ $employee->id }}</td>
                                        <td>{{ $employee->user->name }}</td>
                                        @foreach ($days as $day)
                                            @php
                                                $userAttendance = $employee->checks($day->format('Y-m-d'));
                                            @endphp
                                            <td>
                                                @if ($userAttendance)
                                                    @php
                                                        $employeeStartTime = \Carbon\Carbon::parse(
                                                            $employee->start_time,
                                                        );
                                                        $employeeEndTime = \Carbon\Carbon::parse($employee->end_time);
                                                        $attendanceStartTime = \Carbon\Carbon::parse(
                                                            $userAttendance->start_time,
                                                        );
                                                        $attendanceEndTime = \Carbon\Carbon::parse(
                                                            $userAttendance->end_time,
                                                        );

                                                        $startTimeMatches = $employeeStartTime->greaterThan(
                                                            $attendanceStartTime,
                                                        );
                                                        $endTimeMatches = $employeeEndTime->lessThan(
                                                            $attendanceEndTime,
                                                        );
                                                        // dd($employee);
                                                    @endphp

                                                    <a title="Work start time: {{ $userAttendance->start_time }}, end time: {{ $userAttendance->end_time }} and overall work time in hours: {{ \Carbon\Carbon::parse($userAttendance->overall_time)->format('H:i:s') }}"
                                                        wire:navigate href="/attendance-edit/{{ $userAttendance->id }}"
                                                        style="width: 100%;height: 100%;display: flex;align-items: center;justify-content: center;padding: 0;box-sizing: border-box;"
                                                        class="text btn btn-{{ $startTimeMatches && $endTimeMatches ? 'primary' : 'danger' }}">

                                                        {{ $startTimeMatches && $endTimeMatches ? '+' : '-' }}
                                                    </a>
                                                @else
                                                    <a wire:navigate
                                                        href="/attendance-create/{{ $employee->id }}/{{ $day->format('Y-m-d') }}"
                                                        style="width: 100%;height: 100%;display: flex;align-items: center;justify-content: center;padding: 0;box-sizing: border-box;"
                                                        class="text btn btn-secondary">

                                                        <i class="bi bi-ban"></i>
                                                    </a>
                                                @endif
                                            </td>
                                        @endforeach
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="{{ count($days) + 2 }}" align="center">No data available</td>
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
