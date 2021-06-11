<?php

use App\Http\Controllers\FullCalenderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\Calendars;
use App\Http\Livewire\Countries;
use App\Http\Livewire\CustomerCarts;
use App\Http\Livewire\Customers;
use App\Http\Livewire\Posts;
use Illuminate\Support\Facades\Auth;
use Livewire\Livewire;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/test/{permission}', function ($permission) {
	return Auth::user()->hasPermission($permission) ? 'Si tiene permiso' : 'Acceso denegado';
});
// Roles
Route::resource('/role', RoleController::class)->names('role');

// Permisos
Route::resource('/permission', PermissionController::class)->names('permission');

// Users
Route::resource('/user', UserController::class, ['except' => ['create', 'store']])->names('user');

// Posts
Route::get('country',Countries::class)->name('country'); // Countries
Route::get('post',Posts::class)->name('post');
Route::get('customer',Customers::class)->name('customer');
Route::get('customer-cart',CustomerCarts::class)->name('customer-cart');

Route::get('calendar',Calendars::class)->name('calendar');

Route::get('/fullcalender', [FullCalenderController::class, 'index'])->name('fullcalender');
Route::post('/fullcalender/action', [FullCalenderController::class, 'action'])->name('fullcalender/action');
//Payments Controllers
Route::get('/payment', [PaymentController::class, 'index'])->name('payment');
Route::post('/transaction', [PaymentController::class, 'makePayment'])->name('make-payment');