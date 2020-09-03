<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', 'QuestController@index')->name('quest');
Route::get('home', 'TaskController@index');

Route::prefix('response')->name('response.')->middleware('auth')->group(function () {
    Route::get('', 'ResponseController@index')->name('index');
    Route::get('create', 'ResponseController@create')->name('create');
    Route::post('send', 'ResponseController@send')->name('send');
    Route::post('get', 'ResponseController@get')->name('get');
});

Route::prefix('task')->name('task.')->middleware('auth')->group(function () {
    Route::get('', 'TaskController@index')->name('index');
});

Auth::routes();
