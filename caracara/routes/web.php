<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Tableau;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TableauController;

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

//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    return view('dashboard');
//})->name('dashboard');

Route::resource('/tableau', TableauController::class);

Route::resource('/post', PostController::class);

Route::get('/search', [SearchController::class, 'search'])->name('search');

Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {
    return view('home', ['tableaux' => Tableau::all(), 'posts' => Post::orderBy('created_at', 'desc')->get()]);
})->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/private_posts', function () {
    return view('tableaux/private_posts');
})->name('private_posts');

Route::middleware(['auth:sanctum', 'verified'])->get('/saved_posts/{tabID}', function ($tabID) {
    return view('tableaux/saved_posts', ['tableau' => Tableau::find($tabID)]);
})->name('saved_posts');

Route::middleware(['auth:sanctum', 'verified'])->get('/add_post', function () {
    return view('tableaux/add_post', ['user' => Auth::user(), 'allTableaux' => Tableau::all(), 'allUsers' => User::all()]);
})->name('add_post');

Route::middleware(['auth:sanctum', 'verified'])->get('/add_tableau', function () {
    return view('tableaux/add_tableau', ['user' => Auth::user(), 'allUsers' => User::all()]);
})->name('add_tableau');

Route::middleware(['auth:sanctum', 'verified'])->get('/all_private_tableaux', function () {
    return view('tableaux/all_private_tableaux', ['tableaux' => Tableau::where('prive', 1)->get()]);
})->name('all_private_tableaux');

Route::middleware(['auth:sanctum', 'verified'])->get('/all_public_tableaux', function () {
    return view('tableaux/all_public_tableaux', ['tableaux' => Tableau::where('prive', 0)->get()]);
})->name('all_public_tableaux');

