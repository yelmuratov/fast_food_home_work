<?php

namespace App\Livewire\User;

use App\Models\Category;
use App\Models\Meal;
use Illuminate\Support\Facades\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

class ByCategoryComponent extends Component
{

    //View variables
    public $categories,$meals, $cart, $cartCount;

    public function mount(Category $category)
    {
        $this->cart = session('cart', []);
        $this->cartCount = count($this->cart);
        $this->categories = Category::orderBy('order','asc')->limit(6)->get();
        View::share(['categories' => $this->categories, 'cartCount' => $this->cartCount]);
        $this->meals = Meal::where('category_id',$category->id)->get();
    }
    
    #[Layout('components.layouts.user-meal')]
    public function render()
    {
        return view('livewire.user.by-category-component');
    }
}
