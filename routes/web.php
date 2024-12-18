<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    // return view('welcome');
    return view('home', ['name' => 'John']); 
});

Route::get('/home', [HomeController::class, 'index']);


// // Route to display all posts
// Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

// // Route to display a single post
// Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');

// // Route to create a new post (display form)
// Route::get('/posts/create', function () {
//     return view('posts.create');
// });

// // Route to store a new post
// Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

// // Route to edit a post (display form)
// Route::get('/posts/{id}/edit', function ($id) {
//     $post = App\Models\Post::find($id);
//     return view('posts.edit', compact('post'));
// });

// // Route to update a post
// Route::put('/posts/{id}', [PostController::class, 'update'])->name('posts.update');

// // Route to delete a post
// Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');

// can manual 
// Route::get('posts', [PostController::class, 'index'])->name('posts.index');
// Route::get('posts/create', [PostController::class, 'create'])->name('posts.create');
// Route::post('posts', [PostController::class, 'store'])->name('posts.store');
// Route::get('posts/{id}', [PostController::class, 'show'])->name('posts.show');
// Route::get('posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
// Route::put('posts/{id}', [PostController::class, 'update'])->name('posts.update');
// Route::delete('posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');

// Post resource routes
Route::controller(PostController::class)->group(function () {
    Route::get('/posts', 'index')->name('posts.index');        // List all posts: done
    Route::get('/posts/create', 'create')->name('posts.create'); // Show form to create a post: done
    Route::post('/posts', 'store')->name('posts.store');       // Store a new post: in the form (a method POST) done
    Route::get('/posts/{id}', 'show')->name('posts.show');     // Show a single post: done!
    Route::get('/posts/{id}/edit', 'edit')->name('posts.edit'); // Show form to edit a post: done!
    Route::put('/posts/{id}', 'update')->name('posts.update'); // Update a post: done!
    Route::delete('/posts/{id}', 'destroy')->name('posts.destroy'); // Delete a post: next step! finally
});

// Additional routes for mass actions (if needed)
Route::put('/posts/mass-update', [PostController::class, 'massUpdate'])->name('posts.massUpdate');
Route::delete('/posts/mass-delete', [PostController::class, 'massDelete'])->name('posts.massDelete');