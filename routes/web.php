<?php

Route::get('/', 'ApplicationController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
