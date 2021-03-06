<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;

use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;

use App\Http\Controllers\Admin\PhotoController;
use App\Http\Controllers\Admin\UserRoleController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserPermissionController;

use App\Http\Controllers\TagsController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoriesController;

use App\Mail\LoginCredentials;
use App\Models\User;

Route::name('admin.')->middleware(['auth'])->prefix('admin')->group(function (){
    Route::get('/home', [HomeController::class, '__invoke'])->name('home');
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    Route::resource('posts', PostController::class, ['except' => 'show']);
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class, ['except' => 'show']);
    Route::resource('permissions', PermissionController::class, ['onlu' => ['index', 'edit', 'update']]);
    Route::middleware('role:Admin')
        ->put('users/{user}/roles', UserRoleController::class)
        ->name('users.roles.update');

    Route::middleware('role:Admin')
        ->put('users/{user}/permissions', UserPermissionController::class)
        ->name('users.permissions.update');

    Route::post('/photos/{post}', [PhotoController::class, 'store'])->name('photos.store');
    Route::delete('/photos/{photo}', [PhotoController::class, 'destroy'])->name('photos.destroy');
});

Route::get('/register', [RegisteredUserController::class, 'create'])
    ->middleware('guest')
    ->name('register');

Route::post('/register', [RegisteredUserController::class, 'store'])
    ->middleware('guest');

Route::get('/login', [AuthenticatedSessionController::class, 'create'])
    ->middleware('guest')
    ->name('login');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
    ->middleware('guest');

Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
    ->middleware('guest')
    ->name('password.request');

Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
    ->middleware('guest')
    ->name('password.email');

Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
    ->middleware('guest')
    ->name('password.reset');

Route::post('/reset-password', [NewPasswordController::class, 'store'])
    ->middleware('guest')
    ->name('password.update');

Route::get('/verify-email', [EmailVerificationPromptController::class, '__invoke'])
    ->middleware('auth')
    ->name('verification.notice');

Route::get('/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
    ->middleware(['auth', 'signed', 'throttle:6,1'])
    ->name('verification.verify');

Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
    ->middleware(['auth', 'throttle:6,1'])
    ->name('verification.send');

Route::get('/confirm-password', [ConfirmablePasswordController::class, 'show'])
    ->middleware('auth')
    ->name('password.confirm');

Route::post('/confirm-password', [ConfirmablePasswordController::class, 'store'])
    ->middleware('auth');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

//Route::get('/', [BlogController::class, 'home'])->name('home');
//Route::get('/about', [BlogController::class, 'about'])->name('about');
//Route::get('/archive', [BlogController::class, 'archive'])->name('archive');
//Route::get('/contact', [BlogController::class, 'contact'])->name('contact');

// for spa
Route::get('/{any?}', BlogController::class)->name('home')
->where('any', '.*' );

//Route::get('/blog/{post}', [BlogController::class, 'show'])->name('blog.show');
//Route::get('/blog/tags/{tag}', TagsController::class)->name('blog.tags.show');
//Route::get('/blog/categories/{category}', CategoriesController::class)->name('blog.categories.show');
