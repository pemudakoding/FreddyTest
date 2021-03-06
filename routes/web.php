<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

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
    return redirect()->route('login');
});


Route::middleware(['web'])
    ->name('dashboard.')
    ->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])
            ->name('index');
        Route::get('products', [DashboardController::class, 'products'])
            ->name('product.index');
    });
