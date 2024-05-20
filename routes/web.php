<?php

// Middlewares
use App\Http\Middleware\UserMiddleware as usermid;
use App\Http\Middleware\AdminMiddleware as  adminmid;
use App\Http\Middleware\SaccoMiddleware as saccomid;
use App\Http\Middleware\DriverMiddleware as drivermid;

use Livewire\Volt\Volt;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Livewire\HomePage;
use App\Livewire\Users\Home as UsersHome;
use App\Livewire\Admin\Home as AdminHome;
use App\Livewire\Sacco\Home as SaccoHome;
use App\Livewire\Driver\Home as DriverHome;
use App\Http\Controllers\AuthController;

use App\Livewire\Admin\ViewUsers;
use App\Livewire\Admin\AddUser;
use App\Livewire\Admin\ViewSaccos;
use App\Livewire\Admin\AddSacco;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', HomePage::class);
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');


Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/register', [AuthController::class, 'register'])->name('auth.register');


// SACCO routes
Route::get('sacco/home', SaccoHome::class)->name('sacco_admin.home')->middleware('auth:sacco_admin')->middleware(saccomid::class);

// Admin routes
Route::get('admin/home', AdminHome::class)->name('admin.home')->middleware('auth:admin')->middleware(adminmid::class);
Route::get('admin/view-users', ViewUsers::class)->name('admin.view-users')->middleware('auth:admin')->middleware(adminmid::class);
// Route::get('admin/add-user', AddUser::class)->name('admin.add-user')->middleware('auth:admin')->middleware(adminmid::class);
Route::get('admin/view-saccos', ViewSaccos::class)->name('admin.view-saccos')->middleware('auth:admin')->middleware(adminmid::class);
// Route::get('admin/add-sacco', AddSacco::class)->name('admin.add-sacco')->middleware('auth:admin')->middleware(adminmid::class);

// User routes
Route::get('users/home', UsersHome::class)->name('user.home')->middleware('auth:users')->middleware(usermid::class);

// Driver routes
Route::get('driver/home', DriverHome::class)->name('driver.home')->middleware('auth:driver')->middleware(drivermid::class);

