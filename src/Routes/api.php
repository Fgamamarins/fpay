<?php


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

/*
  Public API Routes
*/

use Fgmarins\Fpay\Http\Controllers\FpayController;

Route::group(['prefix' => 'api/v1'], function() {
    Route::group(['prefix' => 'fpay'], function() {
        Route::get('/sales', [FpayController::class, 'getSales']);
        Route::get('/namedocument', [FpayController::class, 'getSalesNameAndDocument']);
        Route::get('/installments', [FpayController::class, 'getAllSalesInstallments']);
    });
});
