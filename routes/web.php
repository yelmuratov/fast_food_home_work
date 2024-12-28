<?php

use App\Http\Controllers\AuthController;
use App\Livewire\Admin\AttendanceComponent;
use App\Livewire\Admin\AttendanceEditComponent;
use App\Livewire\Admin\AttendanceCreateComponent;
use App\Livewire\User\ByCategoryComponent;
use App\Livewire\User\CartComponent;
use App\Livewire\Admin\CategoryComponent;
use App\Livewire\Admin\DepartmentComponent;
use App\Livewire\Admin\EditEmployeeComponent;
use App\Livewire\Admin\EmployeeComponent;
use App\Livewire\Admin\EmployeeCreateComponent;
use App\Livewire\Admin\FixedSalaryComponent;
use App\Livewire\Admin\MealComponent;
use App\Livewire\Admin\OrderComponent;
use App\Livewire\Admin\SalaryComponent;
use App\Livewire\Admin\UserComponent;
use App\Livewire\AuthComponent;
use App\Livewire\User\OrderProgressComponent;
use App\Livewire\User\UserMealComponent;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

//Admin routes
// Route::middleware('check:admin')->group(function () {
Route::get('/', CategoryComponent::class)->name('category');
Route::get('/meal', MealComponent::class)->name('meal');
Route::get('/order', OrderComponent::class)->name('order');
Route::get('/user', UserComponent::class)->name('user');
Route::get('/department', DepartmentComponent::class)->name('department');
Route::get('/employee', EmployeeComponent::class)->name('employee');
Route::get('/attendance', AttendanceComponent::class)->name('attendance');
Route::get('/fixedSalary', FixedSalaryComponent::class)->name('fixedSalary');
Route::get('/give-salary/{employee}/{amount}/{date}', SalaryComponent::class)->name('giveSalary');
Route::get('/attendance-edit/{attendance}', AttendanceEditComponent::class)->name('attendance-edit');
Route::get('/attendance-create/{employee}/{time}', AttendanceCreateComponent::class)->name('attendance-create');
Route::get('/employee-create', EmployeeCreateComponent::class)->name('employee-create');
Route::get('/employee-edit/{employee}', EditEmployeeComponent::class)->name('employee-edit');
// });


//User routes
// Route::middleware('check:user')->group(function () {
Route::get('/user-meal', UserMealComponent::class);
Route::get('/byCategory/{category}', ByCategoryComponent::class);
Route::get('/cart', CartComponent::class);
Route::get('/order-progress', OrderProgressComponent::class);
// });

//Login

Route::get('/login', AuthComponent::class)->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
