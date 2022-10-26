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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/post/{slug}', 'HomeController@show')->name('post.show');
Route::get('/create/post', 'HomeController@create')->name('post.create');
Route::post('/add/post', 'HomeController@store')->name('post.store');
Route::get('/edit/post/{slug}', 'HomeController@edit')->name('post.edit');
Route::put('/update/post/{slug}', 'HomeController@update')->name('post.update');
Route::delete('/delete/post/{slug}', 'HomeController@delete')->name('post.delete');
Route::delete('/Forcedelete/post/{slug}', 'HomeController@Forcedelete')->name('post.Forcedelete');
Route::get('/restore/{slug}', 'HomeController@restore')->name('post.restore');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// category

Route::resource('categories', CategoryController::class)->except([
    
]);
