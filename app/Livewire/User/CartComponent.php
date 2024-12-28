<?php

namespace App\Livewire\User;

use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;
use Illuminate\Support\Facades\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

class CartComponent extends Component
{
    //View variables
    public $cart, $categories, $cartCount = 0, $cartMeals, $cartSum;

    public function mount()
    {
        $this->cart = session('cart', []);
        $this->cartCount = count($this->cart);
        $this->cartMeals = session('cart', []);
        $this->categories = Category::orderBy('order', 'asc')->limit(6)->get();
        View::share(['categories' => $this->categories, 'cartCount' => $this->cartCount]);
    }

    public function subtractOne($id)
    {
        $cart = session('cart', []);
        if ($cart[$id]) {
            $cart[$id]['quantity']--;
            if ($cart[$id]['quantity'] == 0) {
                unset($cart[$id]);
            }
        }
        session()->put('cart', $cart);
        $this->cart = session('cart', []);
        $this->cartCount = count($this->cart);
        $this->cartMeals = session('cart', []);
        $this->categories = Category::orderBy('order', 'asc')->limit(6)->get();
        View::share(['categories' => $this->categories, 'cartCount' => $this->cartCount]);
    }

    public function addOne($id)
    {
        $cart = session('cart', []);
        if ($cart[$id]) {
            $cart[$id]['quantity']++;
        }
        session()->put('cart', $cart);
        $this->cart = session('cart', []);
        $this->cartCount = count($this->cart);
        $this->cartMeals = session('cart', []);
        $this->categories = Category::orderBy('order', 'asc')->limit(6)->get();
        View::share(['categories' => $this->categories, 'cartCount' => $this->cartCount]);
    }

    public function deleteFromCart($id)
    {
        $cart = session('cart', []);
        unset($cart[$id]);
        session()->put('cart', $cart);
        $this->cart = session('cart', []);
        $this->cartCount = count($this->cart);
        $this->cartMeals = session('cart', []);
        $this->categories = Category::orderBy('order', 'asc')->limit(6)->get();
        View::share(['categories' => $this->categories, 'cartCount' => $this->cartCount]);
    }

    public function createOrder()
    {
        $cart = session('cart', []);
        foreach ($cart as $key => $value) {
            $this->cartSum += $value['quantity'] * $value['price'];
        }
        $date = Carbon::now()->format('Y-m-d');
        $queue = Order::where('date',$date)->count();
        $order = Order::create([
            'date' => $date,
            'queue' => ++$queue,
            'sum' => $this->cartSum
        ]);
        foreach ($cart as $key => $value) {
            OrderItem::create([
                'order_id' => $order->id,
                'meal_id' => $key,
                'count' => $value['quantity'],
                'total_price' => $value['quantity'] * $value['price']
            ]);
        }
        session()->flush();
        $this->cart = session('cart', []);
        $this->cartCount = count($this->cart);
        $this->cartMeals = session('cart', []);
        $this->categories = Category::orderBy('order', 'asc')->limit(6)->get();
        View::share(['categories' => $this->categories, 'cartCount' => $this->cartCount]);
    }

    #[Layout('components.layouts.user-meal')]
    public function render()
    {
        return view('livewire.user.cart-component');
    }
}
