<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
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
Route::group(['namespace' => 'App\Http\Controllers'], function() {
    Route::get('/', function () {
        return view('directory');
    });
    Route::prefix('administrator')->group(function () {

            Auth::routes();
            Route::get('/', [UserController::class, 'dashboard'])->name('dashboard');
            Route::get('/logout', [UserController::class, 'logout'])->name('logout');
            Route::get('/profile', [UserController::class, 'profile'])->name('profile');

            Route::get('/change-password', [UserController::class, 'ChangePassword'])->name('change-password');
            Route::post('/change-password',[UserController::class, 'saveChangePassword'])->name('user.change-password');
            Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');

            /**
             * User Routes
             */
            Route::group(['prefix' => 'users'], function() {
                Route::get('/', [UserController::class, 'index'])->name('users.index');
                Route::get('/create', [UserController::class, 'create'])->name('users.create');
                Route::post('/create', [UserController::class, 'store'])->name('users.store');
                Route::get('/{user}/show', [UserController::class, 'show'])->name('users.show');
                Route::get('/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
                Route::patch('/{user}/update', [UserController::class, 'update'])->name('users.update');
                Route::delete('/{user}/delete', [UserController::class, 'destroy'])->name('users.destroy');
                Route::get('/{user}/status', [UserController::class, 'status'])->name('users.status');
            });

            Route::resource('roles', RolesController::class);
            Route::resource('permissions', PermissionsController::class);

        /**
         * Categories Routes
         */

            Route::group(['prefix' => 'category'], function($prefix) {
                Route::get('/', [CategoryController::class, 'index'])->name('category.index');
                Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
                Route::post('/create', [CategoryController::class, 'store'])->name('category.store');
                Route::get('/{category}/show', [CategoryController::class, 'show'])->name('category.show');
                Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('category.edit');
                Route::patch('/{category}/update', [CategoryController::class, 'update'])->name('category.update');
                Route::delete('/{category}/delete', [CategoryController::class, 'destroy'])->name('category.destroy');
                Route::get('/{category}/status', [CategoryController::class, 'status'])->name('category.status');
            });
        });
    });


