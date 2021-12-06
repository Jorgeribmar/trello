<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TrelloHomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\ProfileController;



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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
})
    ->name('welcome');

/*Route::get('/home/{id}', [TrelloHomeController::class, 'showCard'])
    ->name('home.show');*/

Route::get('/home/{id}', [TrelloHomeController::class, 'show'])
    ->name('home.show');

Route::post('/home', [TrelloHomeController::class, 'store'])
    ->name('home.store');

Route::post('/home/card', [TrelloHomeController::class, 'storeCard'])
    ->name('home.card.storeCard');

Route::get('/home', [HomeController::class, 'index'])
    ->name('home');

Route::delete('/home/{id}/delete', [TrelloHomeController::class, 'destroyList'])
    ->name('list.destroy');

Route::put('/home/{id}', [TrelloHomeController::class, 'editList'])
    ->name('list.edit');

Route::delete('/home/{id}', [TrelloHomeController::class, 'destroyCard'])
    ->name('card.destroy.custom');

Route::put('/home/{id}/edit/custom', [TrelloHomeController::class, 'editCard'])
    ->name('card.edit.custom');

Route::get('/home/{id}/show', [TrelloHomeController::class, 'showCard'])
    ->name('card.show');

Route::put('/home/{id}/description', [TrelloHomeController::class, 'storeDescription'])
    ->name('home.description.storeDescription');

//Route::put('/home/{id}/commentaire', [TrelloHomeController::class, 'storeCommentaire'])
// ->name('home.commentaire.storeCommentaire');

//Route::post('home/comment', [TrelloHomeController::class, 'storeComment'])
// ->name('home.comment.storeComment');

Route::resource('posts', PostController::class);



Route::resource('profile', ProfileController::class);
