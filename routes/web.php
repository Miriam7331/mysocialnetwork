<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
// use App\Models\Link;
// use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommunityLinkController;
use App\Http\Controllers\CommunityLinkUserController;


Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::post('/dashboard', [CommunityLinkController::class, 'store']);

// rutas para el crud
Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('users', UserController::class);
});


Route::resource('community-links', CommunityLinkController::class);

Route::get('/dashboard', [CommunityLinkController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');



Route::get('dashboard/{channel:slug}', [CommunityLinkController::class, 'index']);

/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
*/


Route::get('/contact', function () {
    return view('contact');
})->middleware(['auth', 'verified'])->name('contact');

Route::get('/analytics', function () {
    return view('analytics');
})->middleware(['auth', 'verified'])->name('analytics');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/my-links', [CommunityLinkController::class, 'myLinks'])->name('my-links');
});

Route::post('/votes/{link}', [CommunityLinkUserController::class, 'store'])->middleware('auth', 'verified');

Route::get('/community', [CommunityLinkController::class, 'index'])->name('community.index');

// Route::get('/linkstorage', function(){
//     Artisan::call('storage:link');
// });


// Route::resource('users', UserController::class);







require __DIR__ . '/auth.php';
