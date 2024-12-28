<div>
    <div class="content-wrapper kanban">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h1>Orders</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content pb-3">
            <div class="container-fluid h-100">
                <div class="card card-row card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">
                            All Orders
                        </h3>
                    </div>
                    <div class="card-body">
                        @forelse ($givenOrders as $givenOrder)
                            <div class="card card-secondary card-outline">
                                <div class="card-header">
                                    <h5 class="card-title">Order {{ $givenOrder->id }} {!! $givenOrder->status == '3' ? "<span class='text-danger'>Ready</span>" : '' !!}</h5>
                                    <div class="card-tools">
                                        <a class="btn btn-secondary" data-bs-toggle="collapse"
                                            href="#info{{ $givenOrder->id }}" role="button" aria-expanded="false"
                                            aria-controls="multiCollapseExample1"><i class="bi bi-pencil"></i></a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="collapse multi-collapse" id="info{{ $givenOrder->id }}">
                                            <div class="card card-body">
                                                @if ($givenOrder->orderItems->count() > 0)
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="orderItem"
                                                            {{ in_array($givenOrder->status,[3,4]) ? 'checked' : '' }} disabled>
                                                        <label class="form-check-label" for="orderItem">
                                                            Order Ready
                                                        </label>
                                                    </div>
                                                @endif
                                                @forelse ($givenOrder->orderItems as $orderItem)
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="orderItem{{ $orderItem->id }}"
                                                            {{ $orderItem->status == '3' ? 'checked' : '' }} disabled>
                                                        <label class="form-check-label"
                                                            for="orderItem{{ $orderItem->id }}">
                                                            {{ $orderItem->meal->name . ' x ' . $orderItem->count }}
                                                        </label>
                                                    </div>
                                                @empty
                                                    This order has no items
                                                @endforelse
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="card card-secondary card-outline">
                                <div class="card-header">
                                    <h5 class="card-title">No Orders are here yet</h5>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
                <div class="card card-row card-primary">
                    <div class="card-header">
                        <h3 class="card-title">
                            In Progress
                        </h3>
                    </div>
                    <div class="card-body">
                        @forelse ($inProgressOrders as $inProgressOrder)
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h5 class="card-title">Order {{ $inProgressOrder->id }}</h5>
                                    <div class="card-tools">
                                        <a class="btn btn-primary" data-bs-toggle="collapse"
                                            href="#item{{ $inProgressOrder->id }}" role="button" aria-expanded="false"
                                            aria-controls="multiCollapseExample1"><i class="bi bi-pencil"></i></a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="collapse multi-collapse" id="item{{ $inProgressOrder->id }}">
                                            <div class="card card-body">
                                                @if ($inProgressOrder->orderItems->count() > 0)
                                                    <div class="form-check">
                                                        <input class="form-check-input"
                                                            wire:click="orderReady({{ $inProgressOrder->id }})"
                                                            type="checkbox" value="" id="orderItem"
                                                            {{ $inProgressOrder->status == '3' ? 'checked disabled' : '' }}>
                                                        <label class="form-check-label" for="orderItem">
                                                            Order Ready
                                                        </label>
                                                    </div>
                                                @endif
                                                @forelse ($inProgressOrder->orderItems as $orderItem)
                                                    <div class="form-check">
                                                        <input class="form-check-input"
                                                            wire:click="changeStatus({{ $inProgressOrder }},{{ $orderItem->id }}, '3')"
                                                            type="checkbox" value=""
                                                            id="orderItem{{ $orderItem->id }}"
                                                            {{ $orderItem->status == '3' ? 'checked disabled' : '' }}>
                                                        <label class="form-check-label"
                                                            for="orderItem{{ $orderItem->id }}">
                                                            {{ $orderItem->meal->name . ' x ' . $orderItem->count }}
                                                        </label>
                                                    </div>
                                                @empty
                                                    This order has no items
                                                @endforelse
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h5 class="card-title">No Orders are here yet</h5>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
                <div class="card card-row card-default">
                    <div class="card-header bg-info">
                        <h3 class="card-title">
                            Done
                        </h3>
                    </div>
                    <div class="card-body">
                        @forelse ($doneOrders as $doneOrder)
                            <div class="card card-light card-outline">
                                <div class="card-header">
                                    <h5 class="card-title">Order {{ $doneOrder->id }} <span
                                            class="text-success">Ready</span> </h5>
                                    <div class="card-tools">
                                        <a class="btn btn-info" wire:click="cater({{ $doneOrder->id }})"
                                            aria-expanded="false"><i class="bi bi-pencil"></i></a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="card card-info card-outline">
                                <div class="card-header">
                                    <h5 class="card-title">No Orders ready</h5>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
                <div class="card card-row card-success">
                    <div class="card-header">
                        <h3 class="card-title">
                            Catered
                        </h3>
                    </div>
                    <div class="card-body">
                        @forelse ($cateredOrders as $cateredOrder)
                            <div class="card card-success card-outline">
                                <div class="card-header">
                                    <h5 class="card-title">Order {{ $cateredOrder->id }}</h5>
                                    <div class="card-tools">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @empty
                        @endforelse
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
