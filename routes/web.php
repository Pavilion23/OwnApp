<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContactController;
use App\Models\Contact;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('/', function () {
    return view('home');
})->name('home-route');

Route::get('/about', function () {
    return view('about');
})->name('abort-route');

Route::get('/contact', function () {
    return view('contact', ['data' => Contact::all()]);
})->name('contact-route');

Route::get('/contact/add', function() {
    return view('contact-add');
})->name('contact-add');

Route::get('/lang/{locale}', function(string $locale) {
    if (in_array($locale, Config::get('app.locales'))) {
        Session::put('locale', $locale);
    }
    else Session::put('locale', Config::get('app.locale'));
    
    return redirect()->back();
})->name('lang-change');

Route::controller(ContactController::class)->group(function() {
    Route::post('/contact-form', 'submit')->name('contact-form-submit');
    Route::post('/contact-update/{id}', 'updateContact')->name('contact-update-submit');
    Route::get('/contact/delete/{id}', 'deleteContact')->name('contact-delete');
    Route::get('/contact/update/{id}', 'contactUpdate')->name('contact-update');
});

Route::controller(ClientController::class)->group( function () {
    Route::get('/client', 'client')->name('client-route');
    Route::get('/client/add', 'clientAdd')->name('clientAdd');
    Route::post('client-form','addClient')->name('client-form-submit');
    Route::get('/client/delete/{id}', 'deleteClient')->name('client-delete');
    Route::get('/client/update/{id}', 'clientUpdate')->name('client-edit');
    Route::post('/client-update/{id}','updateClient')->name('client-update');
});
