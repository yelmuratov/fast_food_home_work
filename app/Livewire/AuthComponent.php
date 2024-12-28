<?php

namespace App\Livewire;

use App\Models\Attendance;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AuthComponent extends Component
{
    //View variables
    public $phone, $password;
    public function render()
    {
        return view('livewire.auth-component')->layout('components.layouts.auth');
    }

    public function loginCheck()
    {
        if (Auth::attempt(['phone' => $this->phone, 'password' => $this->password])) {
            if (Auth::user() && Auth::user()->role !== 'admin') {
                Attendance::create([
                    'employee_id' => Auth::user()->employee->id,
                    'user_id' => Auth::user()->id,
                    'date' => Carbon::now()->format('Y-m-d'),
                    'start_time' => Carbon::now()->format('H:i:s')
                ]);
                return redirect()->route('category');
            }
        }
    }
}
