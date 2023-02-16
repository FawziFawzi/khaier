<?php

use App\Http\Controllers\authentication\SignupController;
use App\Http\Controllers\authentication\VerifynumberController;
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
Route::post('/Verify_phone_Number',[VerifynumberController::class,'store'])->middleware('guest');
Route::post('/signup',[SignupController::class,'store'])->middleware('guest');

Route::apiResource('/charities',CharityController::class);
Route::apiResource('/my_cases',MyCaseController::class);


Route::apiResource('/donations',DonationController::class);
