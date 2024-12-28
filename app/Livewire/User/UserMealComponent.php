<?php

namespace App\Livewire\User;

use App\Models\Category;
use App\Models\Meal;
use Illuminate\Support\Facades\View;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\Livewire;

class UserMealComponent extends Component
{
    //View variables
    public $categories, $meals, $cart = [], $cartCount = 0;

    public function mount()
    {
        $cart = session('cart', []);
        $this->cartCount = count($cart);
        $this->categories = Category::orderBy('order', 'asc')->limit(6)->get();
        View::share(['categories' => $this->categories, 'cartCount' => $this->cartCount]);
        $this->meals = Meal::orderBy('order', 'asc')->get();
    }

    public function addToCart(Meal $meal)
    {

        
        $cart = session('cart', []);

        if (isset($cart[$meal->id])) {
            $cart[$meal->id]['quantity']++;
        } else {
            $cart[$meal->id] = [
                'name' => $meal->name,
                'price' => $meal->price,
                'image' => $meal->image,
                'quantity' => 1,
            ];
        }
        $this->cartCount = count($cart);
        session()->put('cart', $cart);
        $this->cart = $cart;
        return $this->redirect('/user-meal');
    }

    #[Layout('components.layouts.user-meal')]
    public function render()
    {
        $cart = session('cart', []);

        $this->cartCount = count($cart);
        $this->categories = Category::orderBy('order', 'asc')->limit(6)->get();
        View::share(['categories' => $this->categories, 'cartCount' => $this->cartCount]);
        $this->meals = Meal::orderBy('order', 'asc')->get();
        return view('livewire.user.user-meal-component');
    }
}
