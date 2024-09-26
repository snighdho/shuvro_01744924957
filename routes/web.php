<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

// Authentication Routes
Auth::routes();

// Home Route
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Admin routes
Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::get('/admin/dashboard', [TicketController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::put('/tickets/{ticket}/close', [TicketController::class, 'close'])->name('tickets.close');
    // Add more admin-specific routes here
});

// Customer routes
Route::group(['middleware' => ['auth', 'role:customer']], function () {
    Route::get('/tickets', [TicketController::class, 'index'])->name('tickets.index');
    Route::post('/tickets', [TicketController::class, 'store'])->name('tickets.store');
    // Add more customer-specific routes here
});

// Landing Page - Redirect to login if not authenticated
Route::get('/', function () {
    return redirect()->route('login');
});

// Ticket Management Routes
Route::resource('tickets', TicketController::class)->middleware(['auth']);

// Update this in your routes/web.php
Route::get('/tickets/{ticket}', [TicketController::class, 'show'])
    ->name('tickets.show')
    ->middleware('auth');

// // Additional Route for Closing Tickets
Route::put('/tickets/{ticket}/close', [TicketController::class, 'close'])
    ->name('tickets.close')
    ->middleware('auth');

// Route for showing ticket details
Route::get('/tickets{ticket}//{id}', [TicketController::class, 'detail'])
    ->name('tickets.detail')
    ->middleware('auth');
