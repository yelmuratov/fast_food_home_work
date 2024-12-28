<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;

class UserComponent extends Component
{
    use WithFileUploads;
    //view variables
    public $createForm = false, $name, $phone, $role, $password, $image, $users;

    public $editForm = false, $editName, $editPhone, $editRole, $editPassword, $editImage;
    public function mount()
    {
        $this->getAllUsers();
    }

    public function render()
    {
        return view('livewire.admin.user-component');
    }

    public function getAllUsers()
    {
        $this->users = User::all();
    }

    public function create()
    {
        $this->createForm = !$this->createForm;
    }

    public function storeUser()
    {
        $image = $this->image->store('images', 'public');
        User::create([
            'name' => $this->name,
            'role' => $this->role,
            'phone' => $this->phone,
            'image' => $image,
            'password' => Hash::make($this->password)
        ]);
        $this->getAllUsers();
        $this->reset(['name', 'createForm', 'password', 'role', 'phone', 'image']);
    }

    public function editUser(User $user)
    {
        $this->editForm = $user->id;
        $this->editName = $user->name;
        $this->editPhone = $user->phone;
        $this->editRole = $user->role;
        $this->image = $user->image;;
    }

    public function updateUser()
    {
        // dd($this->editName, $this->editPhone, $this->editRole,);
        if (empty($this->editPassword) && empty($this->editImage)) {
            $data = [
                'name' => $this->editName,
                'phone' => $this->editPhone,
                'role' => $this->editRole
            ];
        } elseif (!empty($this->editImage) && empty($this->editPassword)) {
            $image = $this->editImage->store('images', 'public');
            $data = [
                'name' => $this->editName,
                'phone' => $this->editPhone,
                'role' => $this->editRole,
                'image' => $image
            ];
        } elseif (empty($this->editImage) && !empty($this->editPassword)) {
            // $image = $this->image->store('images', 'public');
            $data = [
                'name' => $this->editName,
                'phone' => $this->editPhone,
                'role' => $this->editRole,
                'password' => Hash::make($this->editPassword)
            ];
        }

        User::where('id', $this->editForm)->update($data);
        $this->reset(['editForm','editName','editPhone','editRole','image','editImage']);
        $this->getAllUsers();
    }

    public function deleteUser(User $user)
    {
        $user->delete();
        $this->getAllUsers();
    }
}
