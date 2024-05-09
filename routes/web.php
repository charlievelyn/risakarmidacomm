<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\EditorController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', [PagesController::class, 'index']);
Route::get('/articles', [PagesController::class, 'articles']);
Route::get('/team', [PagesController::class, 'team']);
Route::get('/clients', [PagesController::class, 'clients']);
Route::get('/trainingevents', [PagesController::class, 'trainingevent']);
Route::get('/contactus', [PagesController::class, 'contactus']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);


Route::get('/article/{id}', [PagesController::class, 'show_article'])->name('article.show');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [ProfileController::class, 'dashboard'])->name('dashboard');

    Route::get('/db-article', [ArticleController::class, 'article'])->name('db-article');

    // new article post
    Route::post('/db-article/store', [ArticleController::class, 'store'])->name('db-article.store');
    Route::post('/db-article/upload', [ArticleController::class, 'upload'])->name('db-article.upload');

    Route::get('/db-article/{article}', [ArticleController::class, 'show'])->name('db-article.show');

    Route::get('/db-article/{articleId}', [ArticleController::class, 'update'])->name('db-article.update');
    Route::put('/db-article/{articleId}', [ArticleController::class, 'update'])->name('db-article.update');
    // Route::post('/db-article/update', [ArticleController::class, 'update'])->name('db-article.update');

    // Route::put('/db-article/{articleId}', [ArticleController::class, 'update'])->name('db-article.update');
    Route::delete('/db-article/{article}', [ArticleController::class, 'destroy'])->name('db-article.destroy');
});