<?php

use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommentController;
use App\Http\Middleware\EnsureUserIsAdmin;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Passwords\Confirm;
use App\Livewire\Auth\Passwords\Email;
use App\Livewire\Auth\Passwords\Reset;
use App\Livewire\Auth\Register;
use App\Livewire\Auth\Verify;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'index')->name('home');

Route::view('/about', 'about')->name('about');

Route::middleware('guest')->group(function () {
    Route::get('login', Login::class)
        ->name('login');

    Route::get('register', Register::class)
        ->name('register');
});

Route::get('password/reset', Email::class)
    ->name('password.request');

Route::get('password/reset/{token}', Reset::class)
    ->name('password.reset');

Route::middleware('auth')->group(function () {
    Route::get('email/verify', Verify::class)
        ->middleware('throttle:6,1')
        ->name('verification.notice');

    Route::get('password/confirm', Confirm::class)
        ->name('password.confirm');
});

Route::middleware('auth')->group(function () {
    Route::get('email/verify/{id}/{hash}', EmailVerificationController::class)
        ->middleware('signed')
        ->name('verification.verify');

    Route::post('logout', LogoutController::class)
        ->name('logout');
});

/**
 * Posts routes
 */
Route::get('/posts/trash', [PostController::class, 'trash'])->middleware(EnsureUserIsAdmin::class)->name('posts.trash');

Route::post('/posts/restore/{post}', [PostController::class, 'restore'])->middleware(EnsureUserIsAdmin::class)->name('posts.restore');

Route::delete('/posts/forceDelete/{id}', [PostController::class, 'forceDelete'])->middleware(EnsureUserIsAdmin::class)->name('posts.forceDelete');

Route::middleware([EnsureUserIsAdmin::class])->group(function () {
    Route::resource('posts', PostController::class)->except(['index', 'show'])->names([
        'create' => 'posts.create',
        'edit' => 'posts.edit',
    ]);
});

Route::resource('posts', PostController::class)->only(['index', 'show'])->names([
    'index' => 'posts.index',
    'show' => 'posts.show',
]
);

/**
 * Profile routes
 * */
Route::resource('profile', ProfileController::class)->only(['show', 'edit', 'update', 'destroy'])->names([
    'show' => 'profile.show',
    'edit' => 'profile.edit',
    'update' => 'profile.update',
    'destroy' => 'profile.destroy',
]);


/**
 * Comments routes
 */
Route::middleware(['auth'])->group(function () {
    Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
});