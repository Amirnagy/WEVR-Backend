<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Dashbord\ApartmentController;

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



Route::get('/dashbord', function () {
    return view('dashbord.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::controller(ApartmentController::class)->group(function(){
    Route::get('showApartments','showApartments')->name('showApartments');
    Route::post('addApartments','postApartments')->name('addApartments');
});


// Route::get('addApartments',[ApartmentController::class,'showApartments'])
//     ->name('addApartments');

// Route::post('addApartments',[ApartmentController::class,'postApartments'])
//     ->name('addApartments');

require __DIR__.'/auth.php';
// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });
