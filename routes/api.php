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
Route::get('/servicetypes', 'API\CommonController@servicetypes');

// Development version
Route::get('/settings/info', 'API\CommonController@settings');


/* Rider APIs */
Route::group(['prefix' => 'rider'], function(){
    // Register
    Route::post('/register/phone', 'API\AuthController@riderRegisterPostPhone');
    Route::post('/register/otp', 'API\AuthController@verifyOTP');
    Route::post('/register', 'API\AuthController@riderRegister');

    // Login
    Route::post('/login/phone', 'API\AuthController@riderPostPhone');
    Route::post('/login/otp', 'API\AuthController@riderVerifyOTP');
    Route::post('/login', 'API\AuthController@riderLogin');

    Route::group(['middleware' => 'auth:api'], function(){
        // Profile
        Route::get('/profile', 'API\RiderController@getProfileInfo');
        Route::post('/profile', 'API\RiderController@putProfileInfo');

        Route::post('/device/update', 'API\RiderController@updateDevice');

        Route::post('/online', 'API\RiderController@onlineRider');
        Route::get('/offline', 'API\RiderController@offlineRider');
        Route::get('/nearByDrivers', 'API\RiderController@nearByDrivers');
        Route::post('/book', 'API\RiderController@bookRide');
        Route::get('/book/cancel/{book_id}', 'API\RiderController@cancelRide');
        Route::post('/book/feedback/{book_id}', 'API\RiderController@feedbackRide');
        Route::get('/myrides/{type}', 'API\RiderController@myrides');

        Route::get('/promocodes', 'API\CommonController@promocodes');
    });
});

/* Driver APIs */
Route::group(['prefix' => 'driver'], function(){
    Route::post('/phone/verify', 'API\AuthController@verifyPhoneDriver');
    Route::post('/login/phone/verify', 'API\AuthController@verifyPhoneDriverForLogin');
    Route::post('/otp/check', 'API\AuthController@verifyOTP');
    Route::post('/login', 'API\AuthController@loginDriver');
    Route::post('/register', 'API\AuthController@registerDriver');

    Route::group(['middleware' => 'auth:apidriver'], function(){
        Route::post('/device/update', 'API\DriverController@updateDevice');
        Route::post('/online', 'API\DriverController@onlineDriver');
        Route::get('/offline', 'API\DriverController@offlineDriver');
        Route::get('/profile', 'API\DriverController@getDriverInfo');

        # booking
        Route::get('/book/{id}/accept', 'API\DriverController@acceptBook');
        Route::get('/book/{id}/decline', 'API\DriverController@declineBook');
        Route::post('/book/{id}/cancel', 'API\DriverController@cancelBook');
        Route::post('/book/{id}/end', 'API\DriverController@endBook');
    });
});
