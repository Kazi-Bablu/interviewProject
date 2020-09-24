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

Route::get('/', function () {
    return view('auth.login');
});
Auth::routes(['register' => false]);
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

//Customer route
Route::get('customer/view', 'CustomerController@index')->name('customer.view');
Route::get('customer/create', 'CustomerController@create')->name('customer.create');
Route::post('customer/create', 'CustomerController@store')->name('customer.create');

//category route
Route::get('category/view', 'CategoryController@index')->name('category.view');
Route::get('category/create', 'CategoryController@create')->name('category.create');
Route::post('category/create', 'CategoryController@store')->name('category.create');
Route::get('category/delete/{id}', 'CategoryController@delete')->name('category.delete');

//Product route
Route::get('product/view', 'ProductController@index')->name('product.view');
Route::get('product/create', 'ProductController@create')->name('product.create');
Route::post('product/create', 'ProductController@store')->name('product.create');


//proposal route
Route::get('proposal/create', 'ProposalController@create')->name('proposal.create');
Route::post('proposal/create', 'ProposalController@store')->name('proposal.create');
//Route::get('proposal/view', 'ProposalController@index')->name('proposal.view');

//product & service route
Route::post('product/service/create', 'ProposalController@productServiceStore')->name('product.service.create');