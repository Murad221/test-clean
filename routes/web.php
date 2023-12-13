<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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



Route::get('/', [PageController::class, 'main' ])->name('main');
Route::get('dfjkgdfgjdfgdfg', [PageController::class, 'about' ])->name('about');
Route::get('segfdgsrvice', [PageController::class, 'service' ])->name('service');
Route::get('project', [PageController::class, 'project' ])->name('project')->middleware('throttle:100');
Route::get('pages', [PageController::class, 'pages' ])->name('pages');
Route::get('contact', [PageController::class, 'contact' ])->name('contact');
Route::get('single', [PageController::class, 'single' ])->name('single');

Route::get('login', [AuthController::class, 'login' ])->name('login');
Route::post('authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'register_store'])->name('register.store');


Route::get('notifications/{notification}/read', [NotificationsController::class, 'read'])->name('notifications.read');

Route::get('language/{locale}', [LanguageController::class, 'change_locale'])->name('locale.change');

Route::resources([
    'posts' => PostController::class,
    'comments' => CommentController::class,
    'users' => UserController::class,
    'notifications' => NotificationsController::class,
    

]);













