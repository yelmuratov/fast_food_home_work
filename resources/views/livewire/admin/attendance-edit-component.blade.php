<div>
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 mt-3">
                        <h2><strong>Attendance Edit</strong></h2>
                        <a class="btn btn-primary mt-2 mb-3" href="/attendance" wire:navigate>
                            Back
                        </a>
                        <form wire:submit.prevent="updateAttendance">
                            <div class="row mb-3">
                                <div class="col-12 mt-4">
                                    <input type="text" disabled wire:model="name" class="form-control">
                                </div>
                                <div class="col-12 mt-4">
                                    <input type="time" wire:model="custom_start_time" class="form-control"
                                        id="timeInput3" disabled>
                                </div>
                                <div class="col-12 mt-4">
                                    <input type="time" wire:model="custom_end_time" class="form-control"
                                        id="timeInput4" disabled>
                                </div>
                                <div class="col-12 mt-4">
                                    <input type="time" wire:model="start_time" class="form-control" id="timeInput1">
                                </div>
                                <div class="col-12 mt-4">
                                    <input type="time" wire:model="end_time" class="form-control" id="timeInput2">
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
