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

Route::middleware(['auth:api'])->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/Verify_phone_signup',[VerifynumberController::class,'signup'])->middleware('guest');
Route::post('/signup',[SignupController::class,'store'])->middleware('guest');
Route::get('/signup',[SignupController::class, 'create'])->middleware('guest');
Route::post('/login',[LoginController::class,'store'])->middleware('guest');
Route::post('/logout',[LoginController::class,'destroy'])->middleware('auth:api');


Route::post('/Verify_phone_forgetPassword',[VerifynumberController::class,'forgetPassword'])->middleware('guest');
Route::post('/update_password',[LoginController::class,'update']);
Route::get('/home',[homeController::class, 'index'])->middleware('auth:api');

Route::apiResource('/charities',CharityController::class)->middleware(['auth:api']);
Route::apiResource('/my_cases',MyCaseController::class)->middleware(['auth:api']);
Route::apiResource('/categories', CategoryController::class)->middleware(['auth:api']);

Route::get('/bookmarks/charities',[CharityBookmarksController::class,'index'])->middleware('auth:api');
Route::post('/bookmarks/charities',[CharityBookmarksController::class,'store'])->middleware('auth:api');
Route::delete('/bookmarks/charities/{id}',[CharityBookmarksController::class,'destroy'])->middleware('auth:api');
Route::get('/bookmarks/cases',[CaseBookmarksController::class,'index'])->middleware('auth:api');
Route::post('/bookmarks/cases',[CaseBookmarksController::class,'store'])->middleware('auth:api');
Route::delete('/bookmarks/cases/{id}',[CaseBookmarksController::class,'destroy'])->middleware('auth:api');

Route::get('/profile',[ProfileController::class,'index'])->middleware('auth:api');
Route::get('/profile/edit',[ProfileController::class,'edit'])->middleware('auth:api');
Route::post('/profile/update/{user}',[ProfileController::class,'update'])->middleware('auth:api');
Route::post('/profile/update/password/{user}',[ProfileController::class,'updatePassword'])->middleware('auth:api');
Route::delete('/profile/delete/{user}',[ProfileController::class,'destroy'])->middleware('auth:api');

Route::apiResource('/donations',DonationController::class);
