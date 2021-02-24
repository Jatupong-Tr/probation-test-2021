<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Q1\TransactionController;
use App\Http\Controllers\Api\Q1\CategoryController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('q1/categories', [CategoryController::class, 'getCategories']);

Route::group([
    'prefix' => 'q1/transactions'
], function() {
    Route::get('/', [TransactionController::class, 'getTransactions']);
    Route::post('/', [TransactionController::class, 'createTransaction']);
    Route::put('/{id}', [TransactionController::class, 'updateTransaction']);
    Route::delete('/{id}', [TransactionController::class, 'deleteTransaction']);
});
