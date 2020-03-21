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

Route::get('/galery', function(){
    return view('galery');
});


Route::post('add/{id}', function ($id) {
    return $id;
});

Route::put('edit/{id}', function ($id) {
    return $id;
});

Route::delete('delete/{id}', function ($id) {
    return $id;
});
