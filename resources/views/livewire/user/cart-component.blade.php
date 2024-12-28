<div>
    <section class="h-100">
        <div class="container">
            <div class="row d-flex">
                <div class="col-8">
                    @forelse ($cartMeals as $key => $cartMeal)
                        <div class="card rounded-1 mb-1">
                            <div class="card-body">
                                <div class="row d-flex justify-content-between align-items-center">
                                    <div class="col-md-2 col-lg-2 col-xl-2">
                                        <img src="{{ asset('storage/' . $cartMeal['image']) }}"
                                            class="img-fluid rounded-3" alt="Cotton T-shirt">
                                    </div>
                                    <div class="col-md-3">
                                        <p class="lead fw-normal mb-2"><strong>Name:{{ $cartMeal['name'] }}</strong>
                                        </p>
                                    </div>
                                    <div class="col-md-3 col-xl-2 d-flex">
                                        <button class="btn btn-outline-info" style="width: 40px"
                                            wire:click="subtractOne({{ $key }})">
                                            <i class="bi bi-dash-square"></i>
                                        </button>

                                        <input min="0" name="quantity" value="{{ $cartMeal['quantity'] }}"
                                            style="width: 50px;" type="number" class="form-control">

                                        <button class="btn btn-outline-info px-2" style="width: 40px"
                                            wire:click="addOne({{ $key }})">
                                            <i class="bi bi-plus-square"></i>
                                        </button>
                                    </div>
                                    <div class="col col-lg-2 offset-lg-1">
                                        <h5 class="mb-0"><strong>Price:
                                                {{ number_format($cartMeal['price'] * $cartMeal['quantity']) }}
                                                So'm</strong></h5>
                                    </div>
                                    <div class="mr-5">
                                        <a href="#!" class="text-danger" style="font-size: 30px;"
                                            wire:click="deleteFromCart({{ $key }})"><i
                                                class="bi bi-trash"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <h3 style="color: red">Your cart is empty</h3>
                    @endforelse
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                @php
                                    $cartSum = 0;
                                    foreach ($cartMeals as $key => $value) {
                                        $cartSum += $cartMeals[$key]['quantity'] * $cartMeals[$key]['price'];
                                    }
                                @endphp
                                @forelse ($cartMeals as $key => $cartMeal)
                                    <li
                                        class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                        {{ $cartMeal['name'] . ' x ' . $cartMeal['quantity'] }}
                                        <span>{{ number_format($cartMeal['quantity'] * $cartMeal['price']) }}
                                            So'm</span>
                                    </li>
                                    <hr style="border: 1px solid black; width: 75%; margin: 20px auto;">
                                @empty
                                    <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0"
                                        style="color: red">
                                        You have no food chosen
                                    </li>
                                @endforelse
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                    <div>
                                        <strong>Total amount</strong>
                                        <strong>
                                            <p class="mb-0">(including VAT)</p>
                                        </strong>
                                    </div>
                                    <span><strong>{{ number_format($cartSum) }} So'm</strong></span>
                                </li>
                            </ul>

                            <button type="button" data-mdb-button-init data-mdb-ripple-init
                               wire:click="createOrder" class="btn btn-primary btn-lg btn-block">
                                {{ number_format($cartSum) }} So'm
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
