<?php

Auth::routes();


Route::group(['middleware' => ['auth']], function () {
    
    Route::get('/', 'ContatoControl@index')->name('home');
    Route::resource('contato', 'ContatoControl');
});
