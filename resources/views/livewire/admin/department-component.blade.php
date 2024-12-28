<div>
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 mt-3">
                        <h2><strong>Departments</strong></h2>
                        <button class="btn btn-primary mt-2 mb-3"
                            wire:click="createChange">{{ $createDepartment ? 'Back' : 'Create' }}</button>
                        @if ($createDepartment)
                            <form wire:submit.prevent="storeDepartment">
                                <div class="row mb-3">
                                    <div class="col-10">
                                        <input type="text" wire:model="name" class="form-control"
                                            placeholder="Department name">
                                    </div>
                                    <div class="col-2">
                                        <button type="submit" class="btn btn-success">Create</button>
                                    </div>
                                </div>
                            </form>
                        @endif
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Order</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody wire:sortable="updateDepartmentOrder">
                                @forelse ($departments as $department)
                                    @if ($editDepartment == $department->id)
                                        <tr>
                                            <td colspan="4">
                                                <form wire:submit.prevent="updateDepartment">
                                                    <div class="row">
                                                        <div class="col-9 offset-1">
                                                            <input type="text" wire:model="editName"
                                                                class="form-control">
                                                        </div>
                                                        <div class="col-1">
                                                            <button type="submit"
                                                                class="btn btn-success">Store</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>
                                    @else
                                        <tr draggable="true" wire:sortable.item="{{ $department->id }}">
                                            <td>{{ $department->id }}</td>
                                            <td>{{ $department->name }}</td>
                                            <td>{{ $department->order }}</td>
                                            <td>
                                                <button class="btn btn-warning"
                                                    wire:click="editionDepartment({{ $department->id }})"><i
                                                        class="bi bi-pencil"></i></button>
                                                <button class="btn btn-danger"
                                                    wire:click="deleteDepartment({{ $department->id }})"><i
                                                        class="bi bi-trash3"></i></button>
                                            </td>
                                        </tr>
                                    @endif
                                @empty
                                    <tr>
                                        <td colspan="4" style="text-align: center; vertical-align: middle;">No data
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
