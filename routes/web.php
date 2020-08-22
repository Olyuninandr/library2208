<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@getMyBooks')->name('home');

Route::get('/authors', 'AuthorController@getAuthorsList')->name('authors');
Route::get('/author_id/{id}', 'BookController@getBooksList')->name('author_id');

Route::get('/books', 'BookController@getBooksList')
    ->name('books');

Route::get('/add_book',
    ['middleware' => 'auth',
    'uses'=>'AuthorController@getAuthorsListSimple'])
    ->name('add_book');
Route::get('get_book/{id}',
    ['middleware' => 'auth',
    'uses'=> 'BookController@getBook'])
    ->name('get_book');

Route::post('submit_book',
    ['middleware' => 'auth',
     'uses'=>'BookController@submitBook'])
    ->name('book_submit');
Route::post('book_submit_update/{id}',
    ['middleware' => 'auth',
    'uses'=>'BookController@submitBook'])
    ->name('book_submit_update');

Route::get('delete_book/{id}',
    ['middleware'=>'auth',
     'uses'=>'BookController@deleteBook'])
    ->name('book_delete');

