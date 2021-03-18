<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/* Common APIs */
Route::get('/terms', 'API\CommonController@terms');
Route::get('/policy', 'API\CommonController@policy');
Route::get('/countries', 'API\CommonController@countries');
Route::get('/settings/info', 'API\CommonController@settings');

/* Rider Register */
Route::post('/rider/register/phone', 'API\AuthController@riderPostPhone');
Route::post('/rider/register/otp', 'API\AuthController@riderPostVerificationCode');
Route::get('/partners', 'API\CommonController@partners');
Route::post('/rider/register', 'API\AuthController@riderRegister');

/* Rider Login */
Route::post('/rider/login/phone', 'API\AuthController@riderPostPhone');
Route::post('/rider/login/otp', 'API\AuthController@riderPostVerificationCode');
Route::post('/rider/login', 'API\AuthController@riderLogin');

Route::get('/rider/profile/{id}', 'API\RiderController@getProfileInfo');
Route::post('/rider/profile/{id}', 'API\RiderController@putProfileInfo');

Route::post('/rider/{id}/online', 'API\RiderController@onlineRider');
Route::get('/rider/{id}/offline', 'API\RiderController@offlineRider');
Route::get('/rider/{id}/nearByDrivers', 'API\RiderController@nearByDrivers');

/* Driver Lopgin */
Route::post('/driver/{id}/online', 'API\DriverController@onlineDriver');
Route::get('/driver/{id}/offline', 'API\DriverController@offlineDriver');
Route::get('/driver/{id}/profile', 'API\DriverController@getDriverInfo');
