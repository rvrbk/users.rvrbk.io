<?php

Route::get('/{id?}', 'AppController@home');
Route::get('download/{id}', 'SocialController@download');
Route::get('register/{provider}', 'SocialController@register');
Route::get('auth/{provider}', 'SocialController@auth');