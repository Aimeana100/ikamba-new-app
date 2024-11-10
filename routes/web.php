<?php

use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\News\ArticleController;
use App\Http\Controllers\News\CategoryController;
use App\Http\Controllers\News\DashboardController;
use App\Http\Controllers\News\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SocialShareButtonsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontController::class, 'index'])->name('front.index');
Route::get('/articles/category/{categorySlug}', [FrontController::class, 'showCategory'])->name('front.category.articles');
Route::get('/articles/single/{slug}', [FrontController::class, 'single'])->name('front.single');
Route::post('/articles/search', [FrontController::class, 'search'])->name('front.search');
Route::post('/articles/comment', [FrontController::class, 'comment'])->name('front.article.comment');
Route::get('/social-media-share', [SocialShareButtonsController::class]);

//Route::get('/about', [FrontController::class, 'about'])->name('front.about');

//Route::middleware(['auth', 'verified'])->group(function () {
//});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/admin/category', [CategoryController::class, 'index'])->name('admin.category');
    Route::get('/admin/category/create', [CategoryController::class, 'create'])->name('admin.category.create');
    Route::post('/admin/category/store', [CategoryController::class, 'store'])->name('admin.category.store');
    Route::patch('/admin/category/update', [CategoryController::class, 'update'])->name('admin.category.update');
    Route::get('/admin/category/edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::delete('/admin/category/delete/{id}', [CategoryController::class, 'delete'])->name('admin.category.delete');

    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users');
    Route::get('/admin/users/create', [UserController::class, 'create'])->name('admin.users.create');
    Route::get('/admin/users/edit/{id}', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::delete('/admin/users/delete/{id}', [UserController::class, 'delete'])->name('admin.users.delete');
    Route::patch('/admin/users/update', [UserController::class, 'update'])->name('admin.users.update');
    Route::post('/admin/users/store', [UserController::class, 'store'])->name('admin.users.store');

    Route::get('/admin/article', [ArticleController::class, 'index'])->name('admin.article');
    Route::get('/admin/article/create', [ArticleController::class, 'create'])->name('admin.article.create');
    Route::get('/admin/article/edit/{slug}', [ArticleController::class, 'edit'])->name('admin.article.edit');
    Route::get('/admin/article/delete/{id}', [ArticleController::class, 'delete'])->name('admin.article.delete');
    Route::get('/admin/article/review/{slug}', [ArticleController::class, 'review'])->name('admin.article.review');
    Route::patch('/admin/article/publish/{slug}', [ArticleController::class, 'publish'])->name('admin.article.publish');
    Route::post('/admin/article/store', [ArticleController::class, 'store'])->name('admin.article.store');
    Route::patch('/admin/article/update', [ArticleController::class, 'update'])->name('admin.article.update');
    Route::post('/admin/article/upload/image', [ArticleController::class, 'uploadImage'])->name('admin.articles.image.upload');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

});

require __DIR__ . '/auth.php';
