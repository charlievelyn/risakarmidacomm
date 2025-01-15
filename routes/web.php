<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProfileController; 
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TrainingEventsController;
use App\Http\Controllers\Auth\AdminManagerController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\File;
// use App\Http\Controllers\Auth\RegisterController as CustomRegister;

Route::get('/', [PagesController::class, 'index']);
Route::get('/articles', [PagesController::class, 'articles'])->name('articles');
Route::get('/articles/{articleId}', [PagesController::class, 'articles'])->name('articles.show');
Route::get('/team', [PagesController::class, 'team']);
Route::get('/clients', [PagesController::class, 'clients']);
Route::get('/trainingevents', [PagesController::class, 'trainingevent']);
Route::get('/fetch-images', [PagesController::class, 'fetchImages'])->name('fetch-images');

Route::get('/contactus', [PagesController::class, 'contactus']);

Route::get('/GerbangRKC', [LoginController::class, 'gerbang'])->name('pintuGerbang');
Route::post('/GerbangRKC/Login', [LoginController::class, 'masukGerbang'])->name('masukGerbang');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/db-dashboard', [ProfileController::class, 'dashboard'])->name('db-dashboard');
    Route::get('/admin/mainpage', [AdminManagerController::class, 'mainpage'])->name('admin.mainpage');

    Route::get('/admin/listuser', [AdminManagerController::class, 'listuser'])->name('admin.listuser');
    Route::get('/admin/create', [AdminManagerController::class, 'create'])->name('admin.create');
    Route::post('/admin/store', [AdminManagerController::class, 'store'])->name('admin.store');
    Route::delete('/admin/delete/{id}', [AdminManagerController::class, 'destroy'])->name('admin.destroy');
    Route::get('/admin/{id}/change-password', [AdminManagerController::class, 'changePasswordForm'])->name('admin.changePasswordForm');
    Route::put('/admin/{id}/change-password', [AdminManagerController::class, 'changePassword'])->name('admin.changePassword');
    
    Route::get('/banners/listbanner', [BannerController::class, 'listbanner'])->name('banners.listbanner');
    Route::get('/banners', [BannerController::class, 'index'])->name('banners.index');
    Route::post('/banners/store', [BannerController::class, 'store'])->name('banners.store');
    Route::delete('/banners/{id}', [BannerController::class, 'destroy'])->name('banners.destroy');
   
    Route::get('/teams/listteam', [TeamController::class, 'listteam'])->name('team.listteam');
    Route::post('/teams/store', [TeamController::class, 'store'])->name('teams.store');
    Route::delete('/teams/{id}', [TeamController::class, 'destroy'])->name('teams.destroy');

    Route::get('/clients/listclient', [ClientController::class, 'listclient'])->name('clients.listclient');
    // Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
    Route::post('/clients/store', [ClientController::class, 'store'])->name('clients.store');
    Route::delete('/clients/{id}', [ClientController::class, 'destroy'])->name('clients.destroy');
    
    Route::get('/article/listarticle', [ArticleController::class, 'listarticle'])->name('article.listarticle');
    Route::post('/article/store', [ArticleController::class, 'store'])->name('article.store'); 
    Route::post('/article/upload', [ArticleController::class, 'upload'])->name('article.upload');
    
    Route::get('/article/view/{articleId}', [ArticleController::class, 'view'])->name('article.view');
    Route::post('/article/edit/{articleId}', [ArticleController::class, 'edit'])->name('article.edit');
    Route::post('/article/delete/{articleId}', [ArticleController::class, 'destroy'])->name('article.destroy');

    Route::get('/training-events/listevents', [TrainingEventsController::class, 'listevents'])->name('trainingevents.listevents');
    Route::post('/training-events/upload', [TrainingEventsController::class, 'upload'])->name('trainingevents.upload');
    Route::delete('/training-events/{id}', [TrainingEventsController::class, 'delete'])->name('trainingevents.delete');
    Route::get('/article/{id}/image-paths', [TrainingEventsController::class, 'getImagePaths']);
    
    // Route::get('/ckeditor/{file}', function ($file) {
    //     dd($file);
    //     $path = resource_path('ckeditor5/browser/' . $file);
    //     if (!File::exists($path)) {
    //         abort(404);
    //     }
    //     $mimeType = File::mimeType($path);
    //     return response()->file($path, ['Content-Type' => $mimeType]);
    // })->where('file', '.*');
    

    Route::post('/GerbangRKC/Exit', [LoginController::class, 'keluarGerbang'])->name('keluarGerbang');



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

Route::fallback(function () {
    abort(404);
});
