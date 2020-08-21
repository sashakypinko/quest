<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', 'QuestController@index')->name('quest');
Route::get('home', 'TaskController@index');

Route::prefix('response')->name('response.')->middleware('auth')->group(function () {
    Route::get('', 'ResponseController@index')->name('index');
    Route::post('send', 'ResponseController@send')->name('send');
});

Route::prefix('task')->name('task.')->middleware('auth')->group(function () {
    Route::get('', 'TaskController@index')->name('index');
});

Auth::routes();
