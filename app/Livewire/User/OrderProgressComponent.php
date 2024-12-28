<?php

namespace App\Livewire\User;

use App\Models\Category;
use App\Models\Order;
use Illuminate\Support\Facades\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

class OrderProgressComponent extends Component
{

    public $cart, $cartCount, $cartMeals, $categories, $receivedOrders = [], $inProgresses = [], $readies = [];

    public function mount()
    {
        $this->allOrderProgress();
    }

    #[Layout('components.layouts.user-meal')]
    public function render()
    {
        return view('livewire.user.order-progress-component');
    }

    public function allOrderProgress()
    {
        $this->cart = session('cart', []);
        $this->cartCount = count($this->cart);
        $this->cartMeals = session('cart', []);
        $this->receivedOrders = Order::where('status',1)->orderBy('created_at', 'desc')->get();
        $this->inProgresses = Order::where('status',2)->orderBy('created_at', 'desc')->get();
        $this->readies = Order::where('status',3)->orderBy('created_at', 'desc')->get();

        $this->categories = Category::orderBy('order', 'asc')->limit(6)->get();
        View::share(['categories' => $this->categories, 'cartCount' => $this->cartCount]);
    }

    
}
