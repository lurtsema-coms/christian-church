<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');


Route::get('/sermons', function () {
    return Inertia::render('Sermons');
})->name('sermons');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('admin_sermons', function () {
    return Inertia::render('AdminSermons');
})->middleware(['auth', 'verified'])->name('AdminSermons');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
