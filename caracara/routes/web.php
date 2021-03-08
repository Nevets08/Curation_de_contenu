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

//Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {
//    return view('home');
//})->name('home');;

Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {
    return view('home');
})->name('home');

Route::get('/private_posts', function () {
    return view('tableaux/private_posts');
})->name('private_posts');

Route::get('/saved_posts', function () {
    return view('tableaux/saved_posts');
})->name('saved_posts');

Route::get('/add_post', function () {
    return view('tableaux/add_post');
})->name('add_post');

Route::get('/add_tableau', function () {
    return view('tableaux/add_tableau');
})->name('add_tableau');

Route::get('/all_private_tableaux', function () {
    return view('tableaux/all_private_tableaux');
})->name('all_private_tableaux');

Route::get('/all_public_tableaux', function () {
    return view('tableaux/all_public_tableaux');
})->name('all_public_tableaux');
