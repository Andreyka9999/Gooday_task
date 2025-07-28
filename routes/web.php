<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\LandingController;

// -----------------------------------------
// Public routes (Landing pages)
// -----------------------------------------

// Blog list (Landing page)
Route::get('/blogs', [LandingController::class, 'blogs'])->name('landing.blogs');

// News list (Landing page)
Route::get('/news', [LandingController::class, 'news'])->name('landing.news');

// Home page (Welcome/landing)
Route::get('/', [LandingController::class, 'index'])->name('landing');

// Show one blog on landing
Route::get('/blog/{blog}', [LandingController::class, 'showBlog'])->name('landing.blog_show');

// Show one news on landing
Route::get('/news/{news}', [LandingController::class, 'showNews'])->name('landing.news_show');

// -----------------------------------------
// Authenticated user routes
// -----------------------------------------

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Dashboard for logged-in users
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});

// -----------------------------------------
// Admin-only routes (for Admins via Spatie Permission)
// -----------------------------------------

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'role:Admin',    // Permission only for admin
])->prefix('admin')->name('admin.')->group(function () {
   
Route::middleware(['permission:blog.manage'])->group(function () {
    // Blog CRUD for admin panel
    Route::resource('blog', BlogController::class);
});

Route::middleware(['permission:news.manage'])->group(function () {
    // News CRUD for admin panel
    Route::resource('news', NewsController::class);
});

    // User permissions management (view and change user roles)
    Route::get('permissions', [PermissionController::class, 'index'])->name('permissions.index');
    Route::post('permissions/{user}/roles', [PermissionController::class, 'updateRoles'])->name('permissions.updateRoles');

    // Role management (list roles, edit permissions for each role)
    Route::get('roles', [RoleController::class, 'index'])->name('roles.index');
    Route::get('roles/{role}', [RoleController::class, 'edit'])->name('roles.edit');
    Route::post('roles/{role}/permissions', [RoleController::class, 'updatePermissions'])->name('roles.updatePermissions');
});
