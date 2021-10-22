<?php

use App\Http\Controllers\API\ChartController;
use App\Http\Controllers\API\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::get('/charts-data', [ChartController::class, 'dashboard']);
Route::prefix('products')
    ->name('products.')
    ->group(function () {
        Route::get('{id}', [ProductController::class, 'detail'])
            ->name('store');
        Route::post('', [ProductController::class, 'store'])
            ->name('store');
        Route::put('{id}', [ProductController::class, 'update'])
            ->name('update');
        Route::delete('{id}', [ProductController::class, 'destroy'])
            ->name('destroy');
    });
