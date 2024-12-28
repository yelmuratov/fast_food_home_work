<div class="row">
    @foreach ($meals as $meal)
        <div class="col-md-6 col-lg-4">
            <div class="menu-wrap">
                <div class="menus d-flex ftco-animate">
                    <div class="menu-img img" style="background-image: url({{ asset('storage/' . $meal->image) }});"></div>
                    <div class="text">
                        <div class="d-flex">
                            <div class="one-half">
                                <h3>{{ $meal->name }}</h3>
                            </div>
                            <div class="one-forth">
                                <span class="price">{{ $meal->price }}</span>
                            </div>
                        </div>
                        <div class="one-half">
                            <button class="btn btn-outline-danger" style="width: 100%"
                                wire:click="addToCart({{ $meal->id }})">Add To Cart<i class="bi bi-cart3"
                                    style="font-size: 15px;"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
