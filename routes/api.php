<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Person\StoreController;
use App\Http\Controllers\Person\IndexController;
use App\Http\Controllers\Person\UpdateController;
use App\Http\Controllers\Person\DeleteController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['namespace'=> 'person', 'prefix' => 'people'], function(){
    Route::post('/', [StoreController::class, 'store']);
    Route::patch('/{person}', [UpdateController::class, 'update']);
    Route::delete('/{person}', [DeleteController::class, 'delete']);
    Route::get('/', [IndexController::class, 'index']);

});
