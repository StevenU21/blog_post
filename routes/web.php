<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::prefix('/profile')->group(function () {
        Route::get('/', [ProfileController::class, 'index'])->name('profile.index');
        Route::get('/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/update', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/destroy', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    Route::prefix('/ejemplo')->group(function () {
        Route::get('/index', fn () => view('examples.ejemplo.index'))->name('ejemplo.index');
        Route::get('/create', fn () => view('examples.ejemplo.create'))->name('ejemplo.create');
        Route::get('/edit', fn () => view('examples.ejemplo.edit'))->name('ejemplo.edit');
        Route::get('/show', fn () => view('examples.ejemplo.show'))->name('ejemplo.show');
    });

    Route::prefix('/categories')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
        Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');
        Route::post('/', [CategoryController::class, 'store'])->name('categories.store');
        Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::put('/{category}', [CategoryController::class, 'update'])->name('categories.update');
        Route::delete('/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
        Route::get('/{category}', [CategoryController::class, 'show'])->name('categories.show');
    });

    Route::prefix('/posts')->group(function () {
        Route::get('/', [PostController::class, 'index'])->name('posts.index');
        Route::get('/create', [PostController::class, 'create'])->name('posts.create');
        Route::post('/', [PostController::class, 'store'])->name('posts.store');
        Route::get('/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
        Route::put('/{post}', [PostController::class, 'update'])->name('posts.update');
        Route::delete('/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
        Route::get('/{post}', [PostController::class, 'show'])->name('posts.show');
        Route::get('/tags/{name}', [PostController::class, 'postsByTags'])->name('posts.tags');
    });

    Route::prefix('/tags')->group(function () {
        Route::get('/', [TagController::class, 'index'])->name('tags.index');
        Route::get('/create', [TagController::class, 'create'])->name('tags.create');
        Route::post('/', [TagController::class, 'store'])->name('tags.store');
        Route::get('/{tag}/edit', [TagController::class, 'edit'])->name('tags.edit');
        Route::put('/{tag}', [TagController::class, 'update'])->name('tags.update');
        Route::delete('/{tag}', [TagController::class, 'destroy'])->name('tags.destroy');
        Route::get('/{tag}', [TagController::class, 'show'])->name('tags.show');
    });

    Route::prefix('/comments')->group(function () {
        Route::post('/{id}/store', [CommentController::class, 'store'])->name('comments.store');
        Route::get('/{id}/edit', [CommentController::class, 'edit'])->name('comments.edit');
        Route::put('/{id}/update', [CommentController::class, 'update'])->name('comments.update');
        Route::delete('/{id}/destroy', [CommentController::class, 'destroy'])->name('comments.destroy');
    });

    //rutas de posts de tipo resource
    // Route::resource('/posts', PostController::class);
    // Route::resource('/categories', CategoryController::class);
    // Route::resource('/tags', TagController::class);
    // Route::resource('/comments', CommentController::class)->except(['index', 'create', 'show']);
});


require __DIR__ . '/auth.php';
