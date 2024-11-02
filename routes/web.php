<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\AuthCheck;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\ShareUserData;
use Illuminate\Http\Middleware\CheckResponseForModifications;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KarirPostController;
use App\Http\Controllers\BeasiswaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NotificationController;


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

Route::get('/', function () {
    return view('landing');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'showLoginForm')->name('tampilkan.login');
    Route::get('/login-admin', 'showLoginFormAdmin');
    Route::post('/login', 'login')->name('login');
    Route::get('/register', 'showRegisterForm')->name('tampilkan.register');
    Route::post('/register', 'register')->name('register');
    Route::post('/logout', 'logout')->name('logout');
});

Route::controller(UserController::class)->group(function () {
    Route::get('/users', 'index')->name('users');
    Route::get('/users/create', 'create')->name('users.create');
    Route::post('/users', 'store')->name('users.store');
    Route::get('/users/{id}', 'show')->name('users.show');
    Route::get('/users/{id}/edit', 'edit')->name('users.edit');
    Route::put('/users/{id}', 'update')->name('users.update');
    Route::delete('/users/{id}', 'destroy')->name('users.destroy');
});

Route::controller(DashboardController::class)->group(function () {
    Route::get('/dashboard', 'showData')->name('dashboard');
});



Route::get('/editprof', [ProfileController::class, 'showData'])->name('editprof');
Route::put('/editprofUpper/{id}', [ProfileController::class, 'updateDataUpper']);
Route::put('/editprofBelow/{id}', [ProfileController::class, 'updateDataBelow']);
Route::view('/edit/user', 'edit-user')->name('edit-user');
Route::put('/updateProfilePicture/{id}', [ProfileController::class, 'updateProfilePicture']);


// Admin Page

Route::controller(AdminController::class)->group(function () {
    Route::get('/view-users', 'viewusers')->name('view-users');
    Route::get('/user/{id}', 'showdata')->name('show-user');
    Route::post('/update/user/{id}', 'updatedata')->name('update-user');
    Route::get('/delete/user/{id}', 'delete')->name('delete-user');
    Route::post('/download/user', 'downloadUserInfo')->name('download-user');
});


Route::controller(PostController::class)->group(function () {
    Route::get('/event/{id}', 'viewPost')->name('post');
    Route::get('/event', 'index');
    Route::get('/post/{id}', 'showPostId')->name('post_id');
    Route::post('/update/post/{id}', 'updatePost')->name('update-post');
    Route::get('/delete/post/{id}', 'deletePost')->name('delete-post');
});

Route::middleware(['auth'])->group(function () {
    Route::controller(PostController::class)->group(function () {
        Route::get('/admin/event/add', 'showCreateForm')->name('create-event');
        Route::post('/admin/event/add', 'storeNewPost');
        Route::get('/admin', 'showAdminPage')->name('admin');
    });
});
Route::controller(KarirPostController::class)->group(function () {
    Route::get('/karir/{id}', 'viewPost');
    Route::get('/karir', 'index')->name('karir');
});

Route::middleware(['auth'])->group(function () {
    Route::controller(KarirPostController::class)->group(function () {
        Route::view('admin/karir', 'admin.admin-karir');
        Route::get('/admin/karir/add', 'showCreateForm')->name('create-karir');
        Route::post('/admin/karir/add', 'storeNewPost');
    });
});

Route::controller(BeasiswaController::class)->group(function () {
    Route::get('/beasiswa', 'index')->name('beasiswa');
    Route::get('/beasiswa/{id}', 'viewPost');
    Route::view('admin/beasiswa', 'admin.admin-karir');
    Route::post('/admin/beasiswa/add', 'storeNewPost');
    Route::get('/admin/beasiswa/add', 'showCreateForm')->name('create-beasiswa');
});

// User notification routes
Route::controller(NotificationController::class)->group(function () {
    Route::get('/notifications', 'index')->name('notifications.index');
    Route::post('/notifications/mark-read/{id}', 'markAsRead')->name('notifications.markRead');
    Route::post('/notifications/mark-all-read', 'markAllAsRead')->name('notifications.markAllRead');
});

// Admin notification routes
Route::middleware(['auth'])->group(function () {
    Route::controller(NotificationController::class)->prefix('admin/notifications')->name('admin.notifications')->group(function () {
        Route::get('/', 'adminIndex');
        Route::get('/create', 'create')->name('.create');
        Route::post('/store', 'store')->name('.store');
        Route::get('/{id}', 'adminShow')->name('.show');
        Route::get('/{id}/edit', 'adminEdit')->name('.edit');
        Route::put('/{id}', 'adminUpdate')->name('.update');
        Route::delete('/{id}', 'adminDestroy')->name('.destroy');
        Route::post('/bulk-delete', 'adminBulkDelete')->name('.bulkDelete');
        Route::get('/search', 'adminSearch')->name('.search');
    });
});
