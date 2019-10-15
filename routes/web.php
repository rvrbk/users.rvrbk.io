<?php

Route::get('/', 'AppController@home');
Route::get('register/{provider}', 'SocialController@register');
Route::get('auth/{provider}', 'SocialController@auth');