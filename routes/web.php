<?php

use App\Http\Controllers\Admins\ArticleController;
use App\Http\Controllers\Admins\CategoryController;
use App\Http\Controllers\Admins\DashboardController;
use App\Http\Controllers\Admins\UserController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware("auth.admin")->prefix("admins")->group(function () {
    Route::get('/', [DashboardController::class,"index"])->name("admin.index");
    Route::resource('categories', CategoryController::class);
    Route::resource('articles', ArticleController::class);
    Route::resource('users', UserController::class);


    // Route::prefix("categories")->group(function () {
    //     Route::get("/",[CategoryController::class,"index"])->name("categories.index");
    //     Route::get("create",[CategoryController::class,"create"])->name("categories.create");
    //     Route::post("/",[CategoryController::class,"store"])->name("categories.store");
    //     Route::get("{id}",[CategoryController::class,"show"])->name("categories.show");
    //     Route::get("{id}/edit",[CategoryController::class,"edit"])->name("categories.edit");
    //     Route::put("{id}",[CategoryController::class,"update"])->name("categories.update");
    //     Route::delete("{id}",[CategoryController::class,"destroy"])->name("categories.destroy");
    // }
    // );
});

Route::get('login', [DashboardController::class,"login"])->name("login");
Route::post('login', [DashboardController::class,"authLogin"])->name("authLogin");
