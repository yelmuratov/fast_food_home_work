<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use App\Models\Meal;
use Livewire\Component;
use Livewire\WithFileUploads;

class MealComponent extends Component
{
    use WithFileUploads;

    //View variables
    public $createForm = false, $meals = [], $editForm = false;

    //Variables for create
    public $category_id, $name, $price, $image, $categories = [];

    //Variables for edit
    public $editCategory_id, $editName, $editPrice, $editImage, $editionForm;

    public function mount()
    {
        $this->getMeals();
    }

    public function getMeals()
    {
        $this->meals = Meal::orderBy('order', 'asc')->get();
        $this->categories = Category::all();
    }

    public function render()
    {
        return view('livewire.admin.meal-component');
    }

    public function create()
    {
        $this->createForm = !$this->createForm;
    }

    public function store()
    {
        $filePath = $this->image->store('images', 'public');
        // dd($filePath);
        Meal::create([
            'category_id' => $this->category_id,
            'name' => $this->name,
            'price' => $this->price,
            'image' => $filePath
        ]);
        $this->reset(['createForm', 'category_id', 'name', 'price', 'image']);
        $this->getMeals();
    }

    public function updateMealOrder($mealIds)
    {
        foreach ($mealIds as $mealId) {
            Meal::where('id', $mealId['value'])->update(['order' => $mealId['order']]);
        }
        $this->getMeals();
    }

    public function mealEditionForm(Meal $meal)
    {
        $this->editForm = $meal->id;
        $this->editCategory_id = $meal->category_id;
        $this->editName = $meal->name;
        $this->editPrice = $meal->price;
        $this->image = $meal->image;
    }

    public function update()
    {
        if (!empty($this->editImage)) {
            $filePath = $this->editImage->store('images', 'public');
            Meal::where('id', $this->editForm)->update([
                'category_id' => $this->editCategory_id,
                'name' => $this->editName,
                'price' => $this->editPrice,
                'image' => $filePath
            ]);
        } else {
            Meal::where('id', $this->editForm)->update([
                'category_id' => $this->editCategory_id,
                'name' => $this->editName,
                'price' => $this->editPrice,
            ]);
        }
        $this->reset(['editForm', 'editCategory_id', 'editName', 'editPrice', 'editImage', 'image']);
        $this->getMeals();
    }
    
    public function delete(Meal $meal)
    {
        $meal->delete();
        $this->getMeals();
    }
}
