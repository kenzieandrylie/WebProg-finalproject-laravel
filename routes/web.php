<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\GamesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ManageController;
use App\Http\Controllers\ManageGenreController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
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

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/',[HomeController::class,'index']);
Route::get('/searchGame',[HomeController::class,'searchGame']);
Route::get('/details/{id}',[GamesController::class,'showGameDetails']);

Route::get('/login', [LoginController::class,'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class,'authenticate']);
Route::post('/logout', [LoginController::class,'logout']);

Route::get('/register',[RegisterController::class,'index'])->middleware('guest');
Route::post('/register',[RegisterController::class,'store']);

//Profile
Route::get('/profile',[ProfileController::class,'index'])->middleware('auth');
Route::post('/editPass',[ProfileController::class,'editPassword']);
Route::post('/editProfile',[ProfileController::class,'editProfile']);

// Admin
Route::get('/gameManage',[ManageController::class,'index'])->middleware('admin');
Route::delete('/delete-game/{id}',[ManageController::class, 'deleteGame']);
Route::get('/addGamePage',[ManageController::class, 'addGamePage'])->middleware('admin');
Route::post('/add',[ManageController::class, 'addGame']);
Route::get('/edit-game-page/{id}',[ManageController::class, 'editGamePage'])->middleware('admin');
Route::post('/edit-game-page',[ManageController::class, 'editGame']);

Route::get('/genreManage',[ManageGenreController::class,'index'])->middleware('admin');
Route::get('/edit-genre-page/{id}',[ManageGenreController::class, 'editGenrePage'])->middleware('admin');
Route::post('/edit-genre-page',[ManageGenreController::class, 'editGenre']);

//Cart
Route::get('/cartPage',[CartController::class, 'index'])->middleware('auth');
Route::post('/addCart',[CartController::class, 'addCart']);
Route::delete('/delete-cart/{id}',[CartController::class, 'deleteCart']);
Route::post('/update-cart/{id}',[CartController::class, 'updateCart']);
Route::get('/transactionHistory', [CartController::class, 'checkout'])->middleware('auth');
Route::get('/transactionHistoryy', [TransactionController::class, 'index'])->middleware('auth');

// Transaction Detail
Route::get('/transactionDetails/{id}',[TransactionController::class, 'transactionDetail'])->middleware('auth');
