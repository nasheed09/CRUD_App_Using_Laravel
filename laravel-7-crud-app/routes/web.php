<?php
Route::get('/', function () {
    return view('welcome');
});

Route::resource('contacts', 'ContactController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
