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
*/



/*
 *

 Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/logout', function () {
    return view('auth.logout');
});*/
Route::get('/', 'HomeController@index');

Route::get('/catalog', 'Catalog\CatalogController@getIndex');

Route::get('/catalog/show/{id?}', 'Catalog\CatalogController@getShow');

Route::get('/catalog/create', 'Catalog\CatalogController@getCreate');

Route::get('/catalog/edit/{id}', 'Catalog\CatalogController@getEdit');

Route::post('/catalog/create', 'Catalog\CatalogController@store');

Route::post('/catalog/create', 'Catalog\CatalogController@postCreate');

Route::put('/catalog/edit/{id}','Catalog\CatalogController@putEdit');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
