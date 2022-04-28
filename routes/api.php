<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Administrateur\filiereController;

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
Route::controller(filiereController::class)->middleware(['cors'])->prefix('filiere')->group(function () {
    Route::post('/insert', 'insert')->name('InsertFiliere');
    Route::post('/update', 'update')->name('UpdateFiliere');
    Route::get('/delete', 'delete')->name('deletefiliere');
    Route::get('/getAll', 'getall')->name('getAllfiliere');
});





