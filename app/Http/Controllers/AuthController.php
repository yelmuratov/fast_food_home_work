<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{


    public function logout()
    {
        $end_time = Carbon::now(); // Carbon obyekti sifatida hozirgi vaqt
        $date = Carbon::now()->format('Y-m-d');
        $id = Auth::user()->id;

        $user = Attendance::where('user_id', $id)->where('date', $date)->first();

        if ($user) {
            $overall_hours = Carbon::parse($user->start_time)->diffInHours($end_time);
            $overall_mins = Carbon::parse($user->start_time)->diffInMinutes($end_time) % 60;
            $user->update([
                'end_time' => $end_time->format('H:i'),
                'overall_time' => sprintf('%02d:%02d', $overall_hours, $overall_mins)
            ]);
            
            $user = Attendance::where('user_id', $id)->where('date', $date)->first();
        }

        Auth::logout();
        return redirect()->route('login');
    }
}
