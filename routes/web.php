<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use  App\Http\Controllers\MemberController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [PageController::class, 'home']);

Route::middleware('guest')->group(function () {

    Route::get('/signin', [AuthController::class, 'signIn'])->name('signin');
    Route::get('/signup', [AuthController::class, 'signUp']);

    Route::post('/signin', [AuthController::class, 'actionSignIn']);
    Route::post('/signup', [AuthController::class, 'actionSignUp']);
});

Route::middleware('auth')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/book/{book}', [BookController::class, 'showBook']);

    Route::get('/add-book', [BookController::class, 'addBook']);
    Route::post('/add-book', [BookController::class, 'actionAddBook']);

    Route::get('/book/{book}/edit', [BookController::class, 'editBook']);
    Route::post('/book/edit', [BookController::class, 'actionEditBook']);

    Route::get('/book/{id}/delete', [BookController::class, 'deleteBook']);
    
    Route::get('/members',  [MemberController::class, 'showMembers']);
    Route::get('/member/{user}', [MemberController::class, 'showMember']);

    Route::get('/add-member', [MemberController::class, 'addMember']);
});


