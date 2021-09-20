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
Route::get('/farecard/{state_id}/{vehicletype_id}', 'API\CommonController@farecard');
Route::get('/farecardall/{state_id}', 'API\CommonController@farecardall');

Route::get('/tips', 'API\CommonController@tips');

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
	Route::post('/gettoken', 'API\AuthController@gettoken');
	Route::post('/uploadimage','API\RiderController@uploadimage'); 
	
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
        Route::post('/book/payment/{book_id}', 'API\RiderController@requestPayment');
        Route::get('/myrides/{type}/{page}', 'API\RiderController@myrides');

        Route::get('/promocodes', 'API\CommonController@promocodes');
        
        Route::get('/requestbookstatus/{book_id}', 'API\RiderController@requestBookStatus');
        //added by preety
        Route::get('/mypayments/{page_id}', 'API\RiderController@mypayments');
        Route::post('/Comments', 'API\RiderController@comments');
        Route::post('/assigndriver/{driver_id}', 'API\RiderController@assigndriver');
        Route::post('/driverrequestPayment/{book_id}', 'API\RiderController@driverrequestPayment');
        Route::post('/getdeclinedriverreq/{book_id}', 'API\RiderController@getDeclinedriverReq');
        Route::get('/riderrewardpoints', 'API\RiderController@riderRewardpoints');
        Route::post('/deductrewards', 'API\RiderController@deductRewardpoints');
        Route::post('/supportSave', 'API\RiderController@supportSave');
        
    });
});

/* Driver APIs */
Route::group(['prefix' => 'driver'], function(){
    Route::post('/phone/verify', 'API\AuthController@verifyPhoneDriver');
    Route::post('/login/phone/verify', 'API\AuthController@verifyPhoneDriverForLogin');
    Route::post('/otp/check', 'API\AuthController@verifyOTP');
    Route::post('/login/otp', 'API\AuthController@loginOTP'); //new file 4-8-21
    Route::post('/login', 'API\AuthController@loginDriver');
    Route::post('/register', 'API\AuthController@registerDriver');
    Route::get('/getdriverVeh/{driver_id}', 'API\DriverController@getdriverVeh');
    Route::post('/profile-image/{driver_id}','API\DriverController@updateProfileImage');
    Route::post('/documents/{document_id}/{driver_id}/upload', 'API\DriverController@updateDriverDocuments');
    
    Route::group(['middleware' => 'auth:apidriver'], function(){
        Route::post('/device/update', 'API\DriverController@updateDevice');
        Route::post('/online', 'API\DriverController@onlineDriver');
        Route::get('/offline', 'API\DriverController@offlineDriver');
        Route::get('/profile', 'API\DriverController@getDriverInfo');
        Route::post('/profile', 'API\DriverController@putProfileInfo');
        Route::post('/changePassword', 'API\DriverController@changePassword');
        Route::get('/getbookingfordriver', 'API\DriverController@getBookingforDriver');
        
        # booking
        Route::get('/book/{id}/accept', 'API\DriverController@acceptBook');
        Route::post('/book/{id}/{driver_id}/decline', 'API\DriverController@declineBook');
        Route::post('/book/{id}/cancel', 'API\DriverController@cancelBook');
        Route::post('/book/{id}/end', 'API\DriverController@endBook');
      	Route::post('/book/feedback/{book_id}', 'API\DriverController@feedbackTrip');
      	Route::get('/book/{id}/checkstatus', 'API\DriverController@checkTripStatus');
        Route::get('/book/{id}/details', 'API\DriverController@getAppointmentData');
        
        //Driver static pages
        Route::get('/earning', 'API\DriverController@getDriverEarning');
        Route::get('/vehicle/{id}/service', 'API\DriverController@getDriverServices');
        Route::post('/service/{id}/update', 'API\DriverController@updateDriverServices');
        Route::get('/riderRating/{id}', 'API\DriverController@getRiderRating');
        Route::get('/completed-trip', 'API\DriverController@completedTrip');
        Route::get('/canceled-trip', 'API\DriverController@canceledTrip');
        Route::get('/upcoming-trip', 'API\DriverController@upcomingTrip');
        Route::get('/vehicle-details', 'API\DriverController@vehicleDetails');
        Route::post('/vehicle/{vehicle_id}/update', 'API\DriverController@updateVehicleDetails');
        Route::post('/driver-Comments', 'API\DriverController@driverComments');
        Route::post('/abn', 'API\DriverController@driverAbn');
        Route::post('/bank', 'API\DriverController@driverBank');
        Route::get('/bank', 'API\DriverController@getDriverBank');
        Route::get('/documents', 'API\DriverController@getDocuments');
        Route::post('/documents/{document_id}', 'API\DriverController@updateDocuments');
        Route::post('/support', 'API\DriverController@putSupport');
    });
});
