<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\EditorController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TrainingEventsController;
use App\Http\Controllers\Auth\AdminManagerController;
use App\Http\Controllers\Auth\LoginController;
// use App\Http\Controllers\Auth\RegisterController as CustomRegister;

Route::get('/', [PagesController::class, 'index']);
Route::get('/articles', [PagesController::class, 'articles'])->name('articles');
Route::get('/articles/{articleId}', [PagesController::class, 'articles'])->name('articles.show');
Route::get('/team', [PagesController::class, 'team']);
Route::get('/clients', [PagesController::class, 'clients']);
Route::get('/trainingevents', [PagesController::class, 'trainingevent']);
Route::get('/contactus', [PagesController::class, 'contactus']);

Route::get('/GerbangRKC', [LoginController::class, 'showLoginForm'])->name('pintuGerbang');
Route::post('/GerbangRKC/Login', [LoginController::class, 'masuk'])->name('masukGerbang');

Route::middleware(['auth', 'verified'])->group(function () {
    // Route::get('/dashboard', [ProfileController::class, 'dashboard'])->name('dashboard');
    Route::get('/db-dashboard', [ProfileController::class, 'dashboard'])->name('db-dashboard');

    Route::get('/admin/mainpage', [AdminManagerController::class, 'mainpage'])->name('admin.mainpage');

    Route::get('/admin/listuser', [AdminManagerController::class, 'listuser'])->name('admin.listuser');
    Route::get('/admin/create', [AdminManagerController::class, 'create'])->name('admin.create');
    Route::post('/admin/store', [AdminManagerController::class, 'store'])->name('admin.store');
    Route::post('/admin/delete/{id}', [AdminManagerController::class, 'destroy'])->name('admin.destroy');

    Route::get('/article/listarticle', [ArticleController::class, 'listarticle'])->name('article.listarticle');
    Route::post('/article/store', [ArticleController::class, 'store'])->name('article.store'); 
    Route::post('/article/upload', [ArticleController::class, 'upload'])->name('article.upload');
    
    Route::get('/article/view/{articleId}', [ArticleController::class, 'view'])->name('article.view');
    Route::post('/article/edit/{articleId}', [ArticleController::class, 'edit'])->name('article.edit');
    Route::post('/article/delete/{articleId}', [ArticleController::class, 'destroy'])->name('article.destroy');

    Route::get('/trainingevents/listevents', [TrainingEventsController::class, 'view'])->name('trainingevents.listevents');
    Route::post('/trainingevents/upload', [TrainingEventsController::class, 'upload'])->name('trainingevents.upload');    
    
    Route::post('/GerbangRKC/Exit', [LoginController::class, 'keluar'])->name('keluarGerbang');
    // Route::get('/home', [ProfileController::class, 'dashboard'])->name('home');
    // Route::get('/profile', [ProfileController::class, 'dashboard'])->name('profile');
    // Route::get('/page', [ProfileController::class, 'dashboard'])->name('page');
    // Route::get('/virtual-reality', [ProfileController::class, 'dashboard'])->name('virtual-reality');
    // Route::get('/rtl', [ProfileController::class, 'dashboard'])->name('rtl');
    // Route::get('/profile-static', [ProfileController::class, 'dashboard'])->name('profile-static');
    // Route::get('/sign-in-static', [ProfileController::class, 'dashboard'])->name('sign-in-static');
    // Route::get('/sign-up-static', [ProfileController::class, 'dashboard'])->name('sign-up-static');

    // Route::get('/db-article', [ArticleController::class, 'article'])->name('db-article');

    // // new article post
    // Route::post('/db-article/store', [ArticleController::class, 'store'])->name('db-article.store');
    // Route::post('/db-article/upload', [ArticleController::class, 'upload'])->name('db-article.upload');

    // Route::get('/db-article/{article}', [ArticleController::class, 'show'])->name('db-article.show');

    // Route::get('/db-article/{articleId}', [ArticleController::class, 'update'])->name('db-article.update');
    // Route::put('/db-article/{articleId}', [ArticleController::class, 'update'])->name('db-article.update');
    // // Route::post('/db-article/update', [ArticleController::class, 'update'])->name('db-article.update');

    // // Route::put('/db-article/{articleId}', [ArticleController::class, 'update'])->name('db-article.update');
    // Route::delete('/db-article/{article}', [ArticleController::class, 'destroy'])->name('db-article.destroy');
});