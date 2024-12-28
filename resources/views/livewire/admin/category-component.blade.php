<div>
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 mt-3">
                        <h2><strong>Categories</strong></h2>
                        <button class="btn btn-primary mt-2 mb-3"
                            wire:click="create">{{ $createForm ? 'Back' : 'Create' }}</button>
                        @if ($createForm)
                            <form wire:submit.prevent="store">
                                <div class="row mb-3">
                                    <div class="col-10">
                                        <input type="text" wire:model="name" class="form-control"
                                            placeholder="Category name">
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
                            <tbody wire:sortable="updateCategoryOrder">
                                @forelse ($categories as $category)
                                    @if ($editForm == $category->id)
                                        <tr>
                                            <td colspan="4">
                                                <form wire:submit.prevent="edit">
                                                    <div class="row">
                                                        <div class="col-9 offset-1">
                                                            <input type="text" wire:model="editName"
                                                                class="form-control" placeholder="Category name">
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
                                        <tr draggable="true" wire:sortable.item="{{ $category->id }}">
                                            <td>{{ $category->id }}</td>
                                            <td>{{ $category->name }}</td>
                                            <td>{{ $category->order }}</td>
                                            <td>
                                                <button class="btn btn-warning"
                                                    wire:click="editionForm({{ $category->id }})"><i
                                                        class="bi bi-pencil"></i></button>
                                                <button class="btn btn-danger"
                                                    wire:click="delete({{ $category->id }})"><i
                                                        class="bi bi-trash3"></i></button>
                                            </td>
                                        </tr>
                                    @endif
                                @empty
                                    <tr>
                                        <td colspan="3" style="text-align: center; vertical-align: middle;">No data
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
