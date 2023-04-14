<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('abort');

Route::get('/lang/{locale}', function(string $locale) {
    if (in_array($locale, Config('app.locales'))) {
        Session::put('locale', $locale);
    }
    else Session::put('locale', Config('app.locale'));
    
    return redirect()->back();
})->name('lang.change');

Route::controller(ContactController::class)->group(function() {
    Route::get('/contacts', 'index')->name('contacts.index');
    Route::get('/contacts/create', 'create')->name('contacts.create');  
    Route::post('/contacts', 'store')->name('contacts.store');
    Route::get('/contacts/{id}/edit', 'edit')->name('contacts.edit');
    Route::put('/contacts/{id}', 'update')->name('contacts.update');
    Route::delete('/contacts/{id}', 'destroy')->name('contacts.destroy'); 
});

Route::controller(ClientController::class)->group( function () {
    Route::get('/clients', 'index')->name('clients.index');
    Route::get('/clients/create', 'create')->name('clients.create');
    Route::post('/clients', 'store')->name('clients.store');
    Route::get('/clients/{id}/edit', 'edit')->name('clients.edit');
    Route::put('/clients/{id}', 'update')->name('clients.update');
    Route::delete('/clients/{id}', 'destroy')->name('clients.destroy');

    //Route::get('/client/add', 'clientAdd')->name('client-add');
    //Route::post('client-form','addClient')->name('client-form-submit');
    //Route::get('/client/delete/{id}', 'deleteClient')->name('client-delete');
    //Route::get('/client/update/{id}', 'clientUpdate')->name('client-edit');
    //Route::post('/client-update/{id}','updateClient')->name('client-update');
});
