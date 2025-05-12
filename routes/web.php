<?php

use App\Http\Controllers\SermonsController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('/about-us', function () {
    return Inertia::render('AboutUs');
})->name('about-us');

Route::get('/prayer', function () {
    return Inertia::render('Prayer');
})->name('prayer');

Route::get('/online-giving', function () {
    return Inertia::render('OnlineGiving');
})->name('online-giving');

// Route::get('/sermons', function () {
//     return Inertia::render('Sermons');
// })->name('sermons');

Route::get('/sermons', [SermonsController::class, 'display'])->name('sermons');
Route::get('/admin_sermon', [SermonsController::class, 'index'])->middleware(['auth', 'verified'])->name('admin_sermon');
Route::get('/admin_sermons/create', [SermonsController::class, 'create'])->middleware(['auth', 'verified'])->name('sermons.create');
Route::post('/admin_sermons', [SermonsController::class, 'store'])->middleware(['auth', 'verified']);
Route::delete('/admin_sermons/{sermon}', [SermonsController::class, 'destroy'])->middleware(['auth', 'verified'])->name('sermons.destroy');


Route::get('/admin_accounts', function () {
    return Inertia::render('AdminAccounts');
})->middleware(['auth', 'verified'])->name('admin_accounts');

// Route::get('admin_sermons', function () {
//     return Inertia::render('AdminSermons');
// })->middleware(['auth', 'verified'])->name('AdminSermons');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
