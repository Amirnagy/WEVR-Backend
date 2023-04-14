<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Auth\Login;
use App\Http\Controllers\API\Auth\reset;
use App\Http\Controllers\API\Auth\Logout;
use App\Http\Controllers\API\Auth\Register;
use App\Http\Controllers\Api\Products\Products;
use App\Http\Controllers\API\User\UpdateUserInfo;
use App\Http\Controllers\API\Apartments\Apartment;
use App\Http\Controllers\API\Search\searchController;
use App\Http\Controllers\Apartments\ApartmaentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


// producted routes by api sunctum ...
Route::group(['middleware'=>['auth:sanctum']],function () {


    Route::post('updateUser', [UpdateUserInfo::class,'updateUser']);
    Route::post('checkPassword', [UpdateUserInfo::class,'checkpassword']);
    Route::post('changePassword', [UpdateUserInfo::class,'changePassword']);
    Route::post('changePhone', [UpdateUserInfo::class,'changePhone']);
    // -------------------------------------------------------
    Route::get('banners',[Apartment::class,'Banner']);
    Route::get('apartment',[Apartment::class,'Apartment']);
    Route::post('save/apartment/{id}',[Apartment::class,'SaveApartment']);
    Route::get('saved/apartment',[Apartment::class,'SavedApartment']);
    Route::post('reservation/apartment/{id}',[Apartment::class,'reservation']);
    // -------------------------------------------------------
    Route::get('searchfilter',[searchController::class,'search']);
    Route::get('search',[searchController::class,'searchBystatment']);
    // -------------------------------------------------------
    Route::delete('logout', [Logout::class,'logout']);
});
// -----------------------------------------------------

Route::post('register',[Register::class,'register']);
Route::post('login',[Login::class,'login']);
Route::post('resetViaEmail',[reset::class,'sendingEmail']);
Route::post('checkOTP',[reset::class,'checkOPT']);
Route::post('newPassword',[reset::class,'newPassword']);


// -------------------------------------------------------


// Route::resource('product', Products::class);
// Route::get('product/search/{name}', [Products::class,'search']);
