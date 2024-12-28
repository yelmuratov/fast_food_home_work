<div>
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 mt-3">
                        <h2><strong>Users</strong></h2>
                        <button class="btn btn-primary mt-2 mb-3"
                            wire:click="create">{{ $createForm ? 'Back' : 'Create' }}</button>
                        @if ($createForm)
                            <form wire:submit.prevent="storeUser">
                                <div class="row mb-3">
                                    <div class="col-4 mt-2">
                                        <input type="text" wire:model="name" class="form-control"
                                            placeholder="User name">
                                    </div>
                                    <div class="col-4 mt-2">
                                        <input type="number" wire:model="phone" class="form-control"
                                            placeholder="User phone 998...">
                                    </div>
                                    <div class="col-4 mt-2">
                                        <input type="text" wire:model="password" class="form-control"
                                            placeholder="Password">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-4 mt-2">
                                        <select class="form-select" wire:model="role">
                                            <option></option>
                                            <option value="user">User</option>
                                            <option value="admin">Admin</option>
                                        </select>
                                    </div>
                                    <div class="col-4 mt-2">
                                        <input type="file" wire:model="image" class="form-control">
                                    </div>
                                    @if ($image)
                                        <div class="col-3 mt-2">
                                            <img src="{{ $image->temporaryUrl() }}" alt="" style="width: 80px">
                                        </div>
                                    @endif
                                    <div class="col-1 mt-2">
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
                                    <th>Phone</th>
                                    <th>Role</th>
                                    <th>Image</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                    @if ($editForm == $user->id)
                                        <tr>
                                            <td colspan="6">
                                                <form wire:submit.prevent="updateUser">
                                                    <div class="row mb-3">
                                                        <div class="col-4 mt-2">
                                                            <input type="text" wire:model="editName"
                                                                class="form-control" placeholder="User name">
                                                        </div>
                                                        <div class="col-4 mt-2">
                                                            <input type="number" wire:model="editPhone"
                                                                class="form-control" placeholder="User phone 998...">
                                                        </div>
                                                        <div class="col-4 mt-2">
                                                            <input type="text" wire:model="editPassword"
                                                                class="form-control" placeholder="Password">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-3 mt-2">
                                                            <select class="form-select" wire:model="editRole">
                                                                <option></option>
                                                                <option value="user">User</option>
                                                                <option value="admin">Admin</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-3 mt-2">
                                                            <input type="file" wire:model="editImage"
                                                                class="form-control">
                                                        </div>
                                                        @if ($editImage)
                                                            <div class="col-3 mt-2">
                                                                <img src="{{ $editImage->temporaryUrl() }}"
                                                                    alt="" style="width: 80px">
                                                            </div>
                                                        @endif
                                                        <div class="col-2 mt-2">
                                                            <img src="{{ asset('storage/' . $user->image) }}"
                                                                alt="" style="width: 70px">
                                                        </div>
                                                        <div class="col-1 mt-2">
                                                            <button type="submit"
                                                                class="btn btn-success">Create</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->phone }}</td>
                                            <td>{{ $user->role }}</td>
                                            <td>
                                                <img src="{{ asset('storage/' . $user->image) }}" alt=""
                                                    style="width: 70px">
                                            </td>
                                            <td>
                                                <button class="btn btn-warning"
                                                    wire:click="editUser({{ $user->id }})"><i
                                                        class="bi bi-pencil"></i></button>
                                                <button class="btn btn-danger"
                                                    wire:click="deleteUser({{ $user->id }})"><i
                                                        class="bi bi-trash3"></i></button>
                                            </td>
                                        </tr>
                                    @endif
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
