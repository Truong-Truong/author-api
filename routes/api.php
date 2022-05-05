<?php

use App\Http\Controllers\API\EmployeeAuthorController;
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

Route::post('/register', [EmployeeAuthorController::class, 'register']);
Route::post('/login', [EmployeeAuthorController::class, 'login']);

Route::apiResource('/job', JobAll::class)->middleware('auth:api');
