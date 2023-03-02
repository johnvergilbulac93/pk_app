<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Masterfile\ItemController;
use App\Http\Controllers\OptionController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'auth'], function () {
    Route::post('/login',   [AuthController::class, 'login'])->name('user.login');
    Route::post('/logout',   [AuthController::class, 'logout'])->middleware('auth:sanctum')->name('user.logout');
});

Route::group(['prefix' => 'item'], function () {
    Route::get('/',   [ItemController::class, 'index'])->name('item.list');
    Route::post('/',   [ItemController::class, 'create'])->name('item.create');
    Route::get('/{id}', [ItemController::class, 'show'])->name('item.show');
    Route::put('/{id}', [ItemController::class, 'update'])->name('item.update');
    Route::delete('/{id}', [ItemController::class, 'remove'])->name('item.remove');

    Route::group(['prefix' => 'packing'], function () {
        Route::post('/',   [ItemController::class, 'addPacking'])->name('create.packing');
        Route::get('/{itemode}',   [ItemController::class, 'showPacking'])->name('show.packing');
        Route::delete('/{id}',   [ItemController::class, 'deletePacking'])->name('delete.packing');
        Route::put('/{id}',   [ItemController::class, 'updatePacking'])->name('update.packing');
    });

    Route::group(['prefix' => 'price'], function () {
        Route::post('/',   [ItemController::class, 'addPrice'])->name('create.price');
        Route::delete('/{id}',   [ItemController::class, 'deletePrice'])->name('delete.price');
        Route::put('/{id}',   [ItemController::class, 'updatePrice'])->name('update.price');
    });

});
Route::group(['prefix' => 'option'], function () {
    Route::get('/price_group',   [OptionController::class, 'price_group'])->name('option.price.group');
    Route::get('/packing/{id}',   [OptionController::class, 'packing_per_item'])->name('option.packing.per.item');

});
