<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', 'QuestController@index')->name('quest');

Route::prefix('response')->name('response.')->middleware('auth')->group(function () {
    Route::get('', 'ResponseController@index')->name('index');
    Route::post('send', 'ResponseController@send')->name('send');
});

Auth::routes();
