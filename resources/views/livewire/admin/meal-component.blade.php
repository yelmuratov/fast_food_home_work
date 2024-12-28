<div>
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 mt-3">
                        <div>
                            <h2><strong>Meals</strong></h2>
                            <button class="btn btn-primary mt-2 mb-3"
                                wire:click="create">{{ $createForm ? 'Back' : 'Create' }}</button>
                            @if ($createForm)
                                <form wire:submit.prevent="store">
                                    <div class="row mb-3">
                                        <div class="col-4">
                                            <select class="form-select" wire:model="category_id">
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-4">
                                            <input type="text" wire:model="name" class="form-control"
                                                placeholder="Product name">
                                        </div>
                                        <div class="col-4">
                                            <input type="number" wire:model="price" class="form-control"
                                                placeholder="Prduct price">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-8">
                                            <input type="file" wire:model="image" class="form-control">
                                        </div>
                                        @if ($image)
                                            <div class="col-2">
                                                <img src="{{ $image->temporaryUrl() }}" alt="" width="100px">
                                            </div>
                                        @endif
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
                                        <th>Category Name</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Image</th>
                                        <th>Order</th>
                                        <th>Options</th>
                                    </tr>
                                </thead>
                                <tbody wire:sortable="updateMealOrder">
                                    @forelse ($meals as $meal)
                                        @if ($editForm == $meal->id)
                                            <tr>
                                                <td colspan="7">
                                                    <form wire:submit.prevent="update">
                                                        <div class="row mb-3">
                                                            <div class="col-4">
                                                                <select class="form-select"
                                                                    wire:model="editCategory_id">
                                                                    @foreach ($categories as $category)
                                                                        <option value="{{ $category->id }}"
                                                                            {{ $editCategory_id == $category->id ? 'selected' : '' }}>
                                                                            {{ $category->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-4">
                                                                <input type="text" wire:model="editName"
                                                                    class="form-control" placeholder="Product name">
                                                            </div>
                                                            <div class="col-4">
                                                                <input type="number" wire:model="editPrice"
                                                                    class="form-control" placeholder="Prduct price">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <div class="col-6">
                                                                <input type="file" wire:model="editImage"
                                                                    class="form-control">
                                                            </div>
                                                            <div class="col-2">
                                                                <img src="{{ asset('storage/' . $meal->image) }}"
                                                                    alt="" width="100px">
                                                            </div>
                                                            @if ($editImage)
                                                                <div class="col-2">
                                                                    <img src="{{ $editImage->temporaryUrl() }}"
                                                                        alt="" width="100px">
                                                                </div>
                                                            @endif
                                                            <div class="col-2">
                                                                <button type="submit"
                                                                    class="btn btn-success">Update</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </td>
                                            </tr>
                                        @else
                                            <tr draggable="true" wire:sortable.item="{{ $meal->id }}">
                                                <td>{{ $meal->id }}</td>
                                                <td>{{ $meal->category->name }}</td>
                                                <td>{{ $meal->name }}</td>
                                                <td>{{ $meal->price }}</td>
                                                <td>
                                                    <img src="{{ asset('storage/' . $meal->image) }}" alt=""
                                                        width="100px">
                                                </td>
                                                <td>{{ $meal->order }}</td>
                                                <td>
                                                    <button class="btn btn-warning"
                                                        wire:click="mealEditionForm({{ $meal->id }})"><i
                                                            class="bi bi-pencil"></i></button>
                                                    <button class="btn btn-danger"
                                                        wire:click="delete({{ $meal->id }})"><i
                                                            class="bi bi-trash3"></i></button>
                                                </td>
                                            </tr>
                                        @endif
                                    @empty
                                        <tr>
                                            <td colspan="3" style="text-align: center; vertical-align: middle;">No
                                                data available</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

</div>
