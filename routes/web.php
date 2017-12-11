<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
| ---------------------------------------------------------------------------

| API ROUTES |

+-------------------------------------------+---------------------------+
|               URL                         |     Description           |
+-------------------------------------------+---------------------------+
| localhost:8000/api/v1/publishers/list     | List of Publishers        |
+-------------------------------------------+---------------------------+
| localhost:8000/api/v1/publishers/{id}     | ID of Publisher           |
+-------------------------------------------+---------------------------+
| localhost:8000/api/v1/authors/list        | List of Auhtors           |
+-------------------------------------------+---------------------------+
| localhost:8000/api/v1/authors/{id}        | ID of Auhtors             |
+-------------------------------------------+---------------------------+
| localhost:8000/api/v1/books/highlighted   | All featured books        |
+-------------------------------------------+---------------------------+
| localhost:8000/api/v1/books/{id}          | ID of Books               |
+-------------------------------------------+---------------------------+
| localhost:8000/api/v1/books/search/{word} | Search by keyword         |
+-------------------------------------------+--------------------------------------------------+
| localhost:8000/api/v1/books/search/{word}/{offset}/{limit}        | Search /w offset & limit |
+-------------------------------------------+--------------------------------------------------+

*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'api/v1'], function(){

	//Author
	Route::get('/authors/list', 'AuthorController@all');
	Route::get('/authors/{id}', 'AuthorController@getById');

	//Publisher
	Route::get('/publishers/list', 'PublisherController@all');
	Route::get('/publishers/{id}', 'PublisherController@getById');

	Route::group(['prefix' => 'books'], function(){

		//Book
		Route::get('/highlighted', 'BookController@all');
		Route::get('/{id}', 'BookController@getById');

		Route::group(['prefix' => 'search'], function(){
				Route::get('{keyword}', 'BookController@searchByKeyWord');
				Route::get('{keyword}/{offset}/{limit}', 'BookController@searchByKeyWordWithOffSetAndLimit');
		});


	});

});




