<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\VacationController;



Route::get('/get-all', [VacationController::class, 'index']);
Route::get('/get-vacation/{id}', [VacationController::class, 'show']);
Route::post('/create', [VacationController::class, 'store']);
Route::patch('/update/{id}', [VacationController::class, 'update']);
Route::delete('/delete/{id}', [VacationController::class, 'delete']);
Route::get('/get-pdf/{id}', [VacationController::class, 'pdf']);

Route::get('/', function () {
    return response()->json(['Sucess' => true]);
});
