<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;

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

Route::get('/', [HomeController::class, 'home']);
Route::get('/login', [HomeController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/forms', [HomeController::class, 'forms'])->name('forms');
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
Route::get('/create_form', [DashboardController::class, 'viewCreateForm'])->name('create_form');
Route::get('/edit_form/{id}', [DashboardController::class, 'viewEditForm'])->name('edit_form');

Route::post('login/user_login', [LoginController::class, 'userLogin']);
Route::post('/generate_form', [DashboardController::class, 'generateForm']);
Route::post('/update_form', [DashboardController::class, 'updateForm']);
Route::post('/delete_form', [DashboardController::class, 'deleteForm']);
