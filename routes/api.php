<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContactController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(ContactController::class)->group( function() {
    Route::get('/contact/{id}', 'getContact');
    Route::get('/contacts', 'getContacts');
});

Route::controller(ClientController::class)->group(function() {
    Route::get('/client/{id}', 'getClient');
    Route::get('clients', 'getClients');
});