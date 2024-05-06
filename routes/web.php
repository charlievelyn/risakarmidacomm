<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/dashboard', [ProfileController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');
Route::post('/dashboard/store', [ProfileController::class, 'store'])->name('dashboard.store');
Route::post('/dashboard/upload', [ProfileController::class, 'upload'])->name('dashboard.upload');