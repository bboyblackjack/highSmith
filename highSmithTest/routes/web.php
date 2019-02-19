<?php

Route::get('/', 'MainController@index');

Route::post('/author/create', 'MainController@createAuthor');
Route::post('/author/update', 'MainController@updateAuthor');

Route::post('/book/create', 'MainController@createBook');
Route::post('/book/update', 'MainController@updateBook');