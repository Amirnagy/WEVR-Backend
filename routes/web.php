<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Dashbord\ApartmentController;
use App\Http\Controllers\Dashbord\ApartmentDiscount;

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


Route::get('/   ',function (){
    return view('wevr');
});



Route::group(['middleware'=>['auth:sanctum']],function () {

    Route::get('dashbord', function(){
        return view('dashbord.dashboard');
    });

    Route::controller(ApartmentController::class)->group(function(){

        Route::get('showApartments','showApartments')->name('showApartments');

    });

    Route::controller(ApartmentDiscount::class)->group(function(){
        Route::get('discount','makeDiscount')->name('discount');

});



});

require __DIR__.'/auth.php';

