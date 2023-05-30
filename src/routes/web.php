<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PartController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::group([
    'middleware' => 'auth'
], function () {
Route::get('/new_public', [ForumController::class, 'new_public'])->name('new_public');

Route::get('/{forum}/pre_show', [ForumController::class, 'pre_show'])->name('pre_show');
Route::get('/forums/{forum}', [ForumController::class, 'public_theme'])->name('public_theme');

Route::get('/new_user', [UserController::class, 'new_user'])->name('new_user');
Route::get('/{forum}/user-profile', [UserController::class, 'show'])->name('show-user-profile');

Route::get('/NewTheme', [ForumController::class, 'addTheme'])->name('addTheme');
Route::post('/create', [ForumController::class, 'create'])->name('create_theme');
Route::get('/', [ForumController::class, 'index'])->name('index');
Route::get('/{forum}/show', [ForumController::class, 'show'])->name('show');
Route::delete('/{forum}', [ForumController::class, 'destroy'])->name('destroy');
Route::get('/forums/{forum}/edit', [ForumController::class, 'edit'])->name('edit');
Route::put('/forums/{id}', [ForumController::class, 'update'])->name('update');
Route::post('/forums/{forum}/create-comment', [CommentController::class, 'create'])->name('create_comment');

Route::get('/show_detail', [DetailController::class, 'show_detail'])->name('show_detail');
Route::post('/create_detail', [DetailController::class, 'create'])->name('create_detail');
Route::get('/categories/{category}/show_category', [CategoryController::class, 'show_category'])->name('show_category');
Route::get('/details/{detail}/edit_detail', [DetailController::class, 'edit_detail'])->name('edit_detail');
Route::put('/details/{detail}/update_detail', [DetailController::class, 'update_detail'])->name('update_detail');
Route::delete('/details/{detail}/destroy_detail', [DetailController::class, 'destroy_detail'])->name('destroy_detail');

Route::get('/parts', [PartController::class, 'parts'])->name('parts');
Route::post('/create_part', [PartController::class, 'create_part'])->name('create_part');
Route::get('/parts/{part}/edit_part', [PartController::class, 'edit_part'])->name('edit_part');
Route::put('/parts/{part}/update_part', [PartController::class, 'update_part'])->name('update_part');
Route::delete('/parts/{part}/destroy_part', [PartController::class, 'destroy_part'])->name('destroy_part');
});


Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::post('/email/verification-notification', function (\Illuminate\Http\Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/email/verify/{id}/{hash}', function (\Illuminate\Foundation\Auth\EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect()->route('index');
})->middleware(['auth', 'signed'])->name('verification.verify');




Auth::routes();


