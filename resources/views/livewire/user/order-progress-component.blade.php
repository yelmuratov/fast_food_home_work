<div>
    <div class="container text-center">
        <div class="row align-items-center">
            <div class="col-4">
                <div class="card-header text-light" style="background-color: grey; ">
                    Received Orders
                </div>
                <div class="card-body">
                    @forelse ($receivedOrders as $receivedOrder)
                        <strong class="text-danger">
                            {{ $receivedOrder->queue }}
                        </strong>
                    @empty
                        <span class="text-secondary">No orders </span>
                    @endforelse
                </div>
            </div>
            <div class="col-4">
                <div class="card-header text-light" style="background-color: blue;">
                    In progress
                </div>
                <div class="card-body">
                    @forelse ($inProgresses as $inProgress)
                        <span class="text-primary">
                            {{ $inProgress->queue }}
                        </span>
                    @empty
                        <span class="text-primary">No orders</span>
                    @endforelse
                </div>
            </div>
            <div class="col-4">
                <div class="card-header text-light" style="background-color: green; ">
                    Ready to take
                </div>
                <div class="card-body">
                    @forelse ($readies as $ready)
                        <span class="text-success">
                            {{ $ready->queue }}
                        </span>
                    @empty
                        <span class="text-success">No orders</span>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
