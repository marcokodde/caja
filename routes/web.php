<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\Countries;
use App\Http\Livewire\Posts;

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

Route::get('post',Posts::class);
Route::get('country',Countries::class); // Countries
