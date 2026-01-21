<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Modules\Library\app\Http\Controllers\BookController;
use Modules\Library\app\Http\Controllers\DashboardController;


Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        $user = Auth::user();
        if ($user->hasRole('admin')) {
            return app(DashboardController::class)->index();
        }
        return app(DashboardController::class)->index();
    })->name('dashboard');

    // Books listing (everyone logged in can view)
    Route::get('/books', [BookController::class, 'index'])->name('books.index');

    // Admin-only routes (inline role check)
    Route::group([], function () {
        Route::get('/books/create', function () {
            if (!Auth::user()->hasRole('admin')) {
                abort(403, 'Unauthorized');
            }
            return app(BookController::class)->create();
        })->name('books.create');

        Route::post('/books', function () {
            if (!Auth::user()->hasRole('admin')) {
                abort(403, 'Unauthorized');
            }
            return app(BookController::class)->store(request());
        })->name('books.store');

        Route::get('/books/{book}/edit', function ($bookId) {
            if (!Auth::user()->hasRole('admin')) {
                abort(403, 'Unauthorized');
            }
            $book = \Modules\Library\app\Models\Book::findOrFail($bookId);
            return app(BookController::class)->edit($book);
        })->name('books.edit');

        Route::put('/books/{book}', function ($bookId) {
            if (!Auth::user()->hasRole('admin')) {
                abort(403, 'Unauthorized');
            }
            $book = \Modules\Library\app\Models\Book::findOrFail($bookId);
            return app(BookController::class)->update(request(), $book);
        })->name('books.update');

        Route::delete('/books/{book}', function ($bookId) {
            if (!Auth::user()->hasRole('admin')) {
                abort(403, 'Unauthorized');
            }
            $book = \Modules\Library\app\Models\Book::findOrFail($bookId);
            return app(BookController::class)->destroy($book);
        })->name('books.destroy');
    });
});
