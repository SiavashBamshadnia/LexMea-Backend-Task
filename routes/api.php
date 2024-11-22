<?php

use App\Http\Controllers\GuestController;
use App\Http\Controllers\RoomController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResources([
    'rooms' => RoomController::class,
    'guests' => GuestController::class,
]);
Route::post('rooms/set-as-ready', [RoomController::class, 'setAsReady']);
Route::post('guests/{guest}/assign-room', [GuestController::class, 'assignRoom']);
Route::post('guests/{guest}/deassign-room', [GuestController::class, 'deassignRoom']);
