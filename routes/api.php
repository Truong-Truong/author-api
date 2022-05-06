<?php

use App\Http\Controllers\API\AuthenticationController;
use App\Http\Controllers\API\EmployeeController;
use App\Http\Controllers\API\JobAll;
use App\Http\Controllers\SampleGetController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/sample', [SampleGetController::class, 'handle']);
// Route::delete('/sample/delete', [SampleDeleteController::class, 'handle']);
// Route::put('/sample/update', [SamplePutController::class, 'handle']);
// Route::post('/sample/create', [SamplePostController::class, 'handle']);

Route::post('/register', [EmployeeController::class, 'register']);
Route::post('/login', [AuthenticationController::class, 'login']);

Route::group(['middleware' => ['cors', 'json.response']], function () {
    Route::group(['middleware' => 'auth:api'], function () {
        Route::apiResource('/job', JobAll::class);
    });
});
