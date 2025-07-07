<?php

use App\Http\Controllers\AccountsController;
use App\Http\Controllers\AdminCalendar;
use App\Http\Controllers\PrayerController;
use App\Http\Controllers\SermonsController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\Prayer;
use App\Models\Calendar;
use Illuminate\Support\Carbon;

Route::get('/', function () {
    $now = Carbon::now();

    $data = [];
    $data['events'] = Calendar::where('date_time', '>=', $now)->orderBy('date_time')->get();

    return Inertia::render('Welcome', $data);
})->name('home');

Route::get('/about-us', function () {
    return Inertia::render('AboutUs');
})->name('about-us');
    
Route::get('/prayer', function () {
    return Inertia::render('Prayer', ['prayers' => Prayer::approved()->get()]);
})->name('prayer');

Route::get('/online-giving', function () {
    return Inertia::render('OnlineGiving');
})->name('online-giving');

Route::get('/sermons', [SermonsController::class, 'display'])->name('sermons');
Route::get('/admin_sermon', [SermonsController::class, 'index'])->middleware(['auth', 'verified'])->name('admin_sermon');
Route::get('/admin_sermons/create', [SermonsController::class, 'create'])->middleware(['auth', 'verified'])->name('sermons.create');
Route::get('/admin_sermons/{sermon}/edit', [SermonsController::class, 'edit'])->middleware(['auth', 'verified'])->name('sermons.edit');
Route::put('/admin_sermons/{sermon}/update', [SermonsController::class, 'update'])->middleware(['auth', 'verified'])->name('sermons.update');
Route::post('/admin_sermons', [SermonsController::class, 'store'])->middleware(['auth', 'verified']);
Route::delete('/admin_sermons/{sermon}', [SermonsController::class, 'destroy'])->middleware(['auth', 'verified'])->name('sermons.destroy');


Route::get('/admin_accounts',[AccountsController::class,'index'])->middleware(['auth', 'verified'])->name('admin_accounts');
Route::put('/admin_accounts/{id}/approve',[AccountsController::class,'approve'])->middleware(['auth', 'verified']);
Route::put('/admin_accounts/{id}/reject',[AccountsController::class,'reject'])->middleware(['auth', 'verified']);
Route::put('/admin_accounts/{id}/delete',[AccountsController::class,'delete'])->middleware(['auth', 'verified']);
Route::get('/admin_accounts/{account}/edit', [AccountsController::class, 'edit'])->middleware(['auth', 'verified'])->name('accounts.edit');
Route::put('/admin_accounts/{account}/update', [AccountsController::class, 'update'])->middleware(['auth', 'verified'])->name('accounts.update');

// Prayer
Route::resource('admin_prayer', PrayerController::class);


Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('admin_calendar', AdminCalendar::class);
});

// Route::get('/admin_calendar', function () {
//     return Inertia::render('AdminCalendar');
// })->middleware(['auth', 'verified'])->name('admin_calendar');

// Route::get('admin_sermons', function () {
//     return Inertia::render('AdminSermons');
// })->middleware(['auth', 'verified'])->name('AdminSermons');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
