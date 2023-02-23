<?php

use App\Http\Controllers\API\Auth\Login;
use App\Http\Controllers\API\Auth\Logout;
use App\Http\Controllers\API\Auth\Register;
use App\Http\Controllers\API\Auth\reset;
use App\Http\Controllers\Api\Products\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
    Route::resource('product', Products::class);
    //Route::get('product/search/{name}', [Products::class,'search']);
    Route::delete('logout', [Logout::class,'logout']);
});
Route::resource('product', Products::class);
// -----------------------------------------------------
// Route::group(['middleware'=>''])
Route::post('register',[Register::class,'register']);
Route::post('login',[Login::class,'login']);
Route::post('resetViaEmail',[reset::class,'sendingEmail']);
Route::post('checkOTP',[reset::class,'checkOPT']);
Route::post('newPassword',[reset::class,'newPassword']);
// --------------------------------------------------------
// login facebook authantcation
// Route::get('login/facebook',[Login::class,'redirectToFacebook']);
// Route::get('social/login', [Login::class, 'social_Google']);
// Route::get('login/facebook/callback',[Login::class,'handleFacebookCallback']);
// --------------------------------------------------------
// // login instgram authantcation
// Route::get('login/instgram',[Login::class,'redirectToInstgram']);
// Route::get('login/instgram/callback',[Login::class,'handleInstgramCallback']);
// --------------------------------------------------------
// login google authantcation
// Route::get('login/google',[Login::class,'redirectToGoogle']);
// Route::get('login/google/callback',[Login::class,'handleGoogleCallback']);


// Route::post('reset',[::class, 'emailSending']);
// Route::post('new_password',[loginController::class, 'newPassword']);
// -------------------------------------------------------
Route::get('/',function (){
    return view('welldone');
});