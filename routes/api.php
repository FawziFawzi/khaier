<?php

use App\Http\Controllers\authentication\LoginController;
use App\Http\Controllers\authentication\SignupController;
use App\Http\Controllers\authentication\VerifynumberController;
use App\Http\Controllers\CaseBookmarksController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CharityBookmarksController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\CharityController;
use App\Http\Controllers\MyCaseController;

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
Route::middleware(['guest:api'])->group(function (){
    Route::post('/Verify_phone_signup',[VerifynumberController::class,'signup']);
    Route::post('/signup',[SignupController::class,'store']);
    Route::get('/signup',[SignupController::class, 'create']);
    Route::post('/login',[LoginController::class,'store']);
    Route::post('/Verify_phone_forgetPassword',[VerifynumberController::class,'forgetPassword']);
    Route::post('/update_password',[LoginController::class,'update']);
});
Route::middleware(['auth:api'])->group(function () {
    Route::post('/logout',[LoginController::class,'destroy']);
    Route::get('/home',[homeController::class, 'index']);

    Route::apiResource('/categories', CategoryController::class);


    Route::apiResource('/charities',CharityController::class);

    Route::get('/bookmarks/charities',[CharityBookmarksController::class,'index']);
    Route::post('/bookmarks/charities',[CharityBookmarksController::class,'store']);
    Route::delete('/bookmarks/charities/{id}',[CharityBookmarksController::class,'destroy']);

    Route::apiResource('/my_cases',MyCaseController::class);

    Route::get('/bookmarks/cases',[CaseBookmarksController::class,'index']);
    Route::post('/bookmarks/cases',[CaseBookmarksController::class,'store']);
    Route::delete('/bookmarks/cases/{id}',[CaseBookmarksController::class,'destroy']);

    Route::get('/profile',[ProfileController::class,'index']);
    Route::get('/profile/edit',[ProfileController::class,'edit']);
    Route::post('/profile/update/{user}',[ProfileController::class,'update']);
    Route::post('/profile/update/password/{user}',[ProfileController::class,'updatePassword']);
    Route::delete('/profile/delete/{user}',[ProfileController::class,'destroy']);

    Route::post('/donation/{case}',[DonationController::class,'store']);
    Route::get('/donation/old/cases',[DonationController::class,'index']);
    Route::get('/donation/details',[DonationController::class,'show']);

    Route::post('/charity/add',[CharityController::class,'store'])->middleware('admin');
    Route::post('/charity/{charity}/addcase',[MyCaseController::class,'store'])->middleware('admin');

});


