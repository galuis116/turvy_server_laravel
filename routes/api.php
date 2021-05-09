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

/* Common APIs */
Route::get('/terms', 'API\CommonController@terms');
Route::get('/policy', 'API\CommonController@policy');
Route::get('/countries', 'API\CommonController@countries');
Route::get('/states/{country_id}', 'API\CommonController@states');
Route::get('/cities/{city_id}', 'API\CommonController@cities');
Route::get('/partners', 'API\CommonController@partners');
Route::get('/makes', 'API\CommonController@makes');
Route::get('/models/{make_id}', 'API\CommonController@models');

Route::group(['middleware' => 'auth:api'], function(){
    Route::get('/settings/info', 'API\CommonController@settings');
    Route::get('/promocodes', 'API\CommonController@promocodes');
    Route::get('/servicetypes', 'API\CommonController@servicetypes');
});

/* Rider APIs */
Route::group(['prefix' => 'rider'], function(){
    // Register
    Route::post('/register/phone', 'API\AuthController@riderRegisterPostPhone');
    Route::post('/register/otp', 'API\AuthController@verifyOTP');
    Route::post('/register', 'API\AuthController@riderRegister');

    // Login
    Route::post('/login/phone', 'API\AuthController@riderPostPhone');
    Route::post('/login/otp', 'API\AuthController@verifyOTP');
    Route::post('/login', 'API\AuthController@riderLogin');

    Route::group(['middleware' => 'auth:api'], function(){
        // Profile
        Route::get('/profile/{id}', 'API\RiderController@getProfileInfo');
        Route::post('/profile/{id}', 'API\RiderController@putProfileInfo');

        Route::post('/device/update', 'API\RiderController@updateDevice');

        Route::post('/{id}/online', 'API\RiderController@onlineRider');
        Route::get('/{id}/offline', 'API\RiderController@offlineRider');
        Route::get('/{id}/nearByDrivers', 'API\RiderController@nearByDrivers');
        Route::post('/book', 'API\RiderController@bookRide');
    });
});

/* Driver APIs */
Route::group(['prefix' => 'rider'], function(){
    Route::post('/phone/verify', 'API\AuthController@verifyPhoneDriver');
    Route::post('/login/phone/verify', 'API\AuthController@verifyPhoneDriverForLogin');
    Route::post('/otp/check', 'API\AuthController@verifyOTP');
    Route::post('/login', 'API\AuthController@loginDriver');
    Route::post('/register', 'API\AuthController@registerDriver');

    Route::group(['middleware' => 'auth:api'], function(){
        Route::post('/device/update', 'API\DriverController@updateDevice');
        Route::post('/{id}/online', 'API\DriverController@onlineDriver');
        Route::get('/{id}/offline', 'API\DriverController@offlineDriver');
        Route::get('/{id}/profile', 'API\DriverController@getDriverInfo');
    });
});
