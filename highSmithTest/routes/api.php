<?php

use Illuminate\Http\Request;

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/


Route::get('/v1/books/list', 'ApiController@getAllBooks');

Route::get('/v1/books/find/{id}', 'ApiController@getBook');

Route::post('/v1/books/update/{id}', 'ApiController@updateBook');

Route::delete('/v1/books/id/{id}', 'ApiController@deleteBook');
