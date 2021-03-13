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

Route::group(['middleware' => 'auth:sanctum'], function () {

    Route::get('/', function () {
        return view('home', [
            'tableaux' => Tableau::all(),
            'posts' => Post::orderBy('created_at', 'desc')->get()
        ]);
    })->name('home');

    Route::resource('/tableau', TableauController::class);

    Route::resource('/post', PostController::class);

    Route::get('/create/{tabID?}', function ($tabID = null) {
        return view('post/create', [
            'user' => Auth::user(),
            'allTableaux' => Tableau::all(),
            'allUsers' => User::all(),
            'tableau' => Tableau::find($tabID)]);
    })->name('post.create');

    Route::get('/search', [SearchController::class, 'search'])->name('search');

    Route::get('/saved_posts/{tabID}', function ($tabID) {
        return view('tableaux/saved_posts', ['tableau' => Tableau::find($tabID), 'tableaux' => Tableau::all()]);
    })->name('saved_posts');

    Route::get('/all_private_tableaux', function () {
        return view('tableaux/all_private_tableaux', ['tableaux' => Tableau::where('prive', 1)->where('id', '<>', Auth::user()->tableauSaved->id)->get()]);
    })->name('all_private_tableaux');

    Route::get('/all_public_tableaux', function () {
        return view('tableaux/all_public_tableaux', ['tableaux' => Tableau::where('prive', 0)->get()]);
    })->name('all_public_tableaux');

});




