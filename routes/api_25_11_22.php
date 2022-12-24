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
Route::get('/airport_polygon', 'API\CommonController@airport_polygon');
Route::get('/states/{country_id}', 'API\CommonController@states');
Route::get('/cities/{city_id}', 'API\CommonController@cities');
Route::get('/partners', 'API\CommonController@partners');
Route::get('/makes', 'API\CommonController@makes');
Route::get('/models/{make_id}', 'API\CommonController@models');
Route::get('/servicetypes', 'API\CommonController@servicetypes');
Route::get('/farecard/{state_id}/{vehicletype_id}', 'API\CommonController@farecard');
Route::get('/farecardall/{state_id}', 'API\CommonController@farecardall');
Route::get('/websockettest','API\WebSocketCont@index');
Route::get('/tips', 'API\CommonController@tips');
Route::get('/makeCall', 'API\CommonController@twilioMakeCall');

Route::get('/responseCall', 'API\CommonController@twilioResponseCall');
Route::get('/sendMeassge', 'API\CommonController@twilioSendMessage');
Route::get('/makeCall', 'API\CommonController@twilioMakeCall');
//Route::post('/makeCall', 'API\CommonController@twilioMakeCall');
// Route::get('/twiliomakecallrider', 'API\CommonController@twilioMakeCallRider');

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
	Route::post('/twiliomakecallrider', 'API\RiderController@twilioMakeCallRider');
	Route::post('/twiliowebhook', 'API\RiderController@twiliowebhook');
	Route::get('/testwebhook', 'API\RiderController@testwebhook');
	
    Route::group(['middleware' => 'auth:api'], function(){
        // Profile
        Route::get('/profile', 'API\RiderController@getProfileInfo');
        Route::post('/profile', 'API\RiderController@putProfileInfo');

        Route::post('/device/update', 'API\RiderController@updateDevice');
        
		  Route::get('/get_receipt/{book_id}', 'API\RiderController@tripreceipt');
		  Route::get('/send_receipt/{book_id}', 'API\RiderController@emailtripreceipt');
		  
        Route::post('/online', 'API\RiderController@onlineRider');
        Route::get('/offline', 'API\RiderController@offlineRider');
        Route::get('/nearByDrivers', 'API\RiderController@nearByDrivers');
        Route::post('/book', 'API\RiderController@bookRide');
        Route::post('/getRemovedDriver', 'API\RiderController@getRemovedDriver');
        Route::post('/book/cancel/{book_id}', 'API\RiderController@cancelRide');
        Route::post('/book/retry/{book_id}', 'API\RiderController@retryBooking');
        Route::post('/book/feedback/{book_id}', 'API\RiderController@feedbackRide');
        Route::post('/book/payment/{book_id}', 'API\RiderController@requestPayment');
        Route::get('/myrides/{type}/{page}', 'API\RiderController@myrides');

        Route::get('/promocodes', 'API\CommonController@promocodes');
        
        Route::get('/requestbookstatus/{book_id}', 'API\RiderController@requestBookStatus');
        Route::get('/getcancelamount/{book_id}', 'API\RiderController@getcancelAmount');
        Route::get('/driverRating/{id}', 'API\RiderController@getDriverRating');
        //added by preety
        Route::get('/mypayments/{page_id}', 'API\RiderController@mypayments');
        Route::get('/mytransaction/{page_id}', 'API\RiderController@myTransactions');
        Route::post('/Comments', 'API\RiderController@comments');
        Route::post('/assigndriver/{driver_id}', 'API\RiderController@assigndriver');
        Route::post('/driverrequestPayment/{book_id}', 'API\RiderController@driverrequestPayment');
        Route::post('/getdeclinedriverreq/{book_id}', 'API\RiderController@getDeclinedriverReq');
        Route::get('/riderrewardpoints', 'API\RiderController@riderRewardpoints');
        Route::post('/deductrewards', 'API\RiderController@deductRewardpoints');
        Route::post('/deductwalletamount', 'API\RiderController@deductWalletAmount');
        Route::post('/supportSave', 'API\RiderController@supportSave');
        Route::get('/ridercharity', 'API\RiderController@riderCharity');
        Route::post('/changePassword', 'API\RiderController@changePassword');
        Route::get('/ongoinglastride', 'API\RiderController@getRiderLastRequest');
        Route::post('/addPaytoken', 'API\RiderController@addPaytoken');
        Route::get('/getPaymentToken', 'API\RiderController@getPaymentToken');
        Route::get('/getCurrentRunningTrip/{book_id}', 'API\RiderController@getCurrentRunningTrip');
        Route::get('/mymessages/{page_id}', 'API\RiderController@mymessages');
        Route::get('/getunreadmessages', 'API\RiderController@getunreadmessagesCount');
        Route::post('/readmessages', 'API\RiderController@updateUnreadMessage');
        Route::post('/sendMessageToRider', 'API\RiderController@sendmessages');
        Route::post('/addRiderAddress', 'API\RiderController@addRiderAddress');
        Route::get('/getRiderAddress', 'API\RiderController@getRiderAddress');
        Route::post('/addAStop', 'API\RiderController@addAStop');
        Route::post('/getBookingRiderMessage', 'API\RiderController@getMessagesBYBooking');
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
    Route::post('/vehicle-image/{driver_id}','API\DriverController@updateVehicleImage');
    
    Route::group(['middleware' => 'auth:apidriver'], function(){
        Route::post('/device/update', 'API\DriverController@updateDevice');
        Route::post('/online', 'API\DriverController@onlineDriver');
        Route::get('/offline', 'API\DriverController@offlineDriver');
        Route::get('/profile', 'API\DriverController@getDriverInfo');
        Route::post('/profile', 'API\DriverController@putProfileInfo');
        Route::post('/changePassword', 'API\DriverController@changePassword');
        Route::get('/getbookingfordriver/{book_id}', 'API\DriverController@getBookingforDriver');
        
        # booking
        Route::get('/book/{id}/accept', 'API\DriverController@acceptBook');
        Route::post('/book/{id}/{driver_id}/decline', 'API\DriverController@declineBook');
        Route::post('/book/{id}/cancel', 'API\DriverController@cancelBook');
        Route::post('/book/{id}/end', 'API\DriverController@endBook');
      	Route::post('/book/feedback/{book_id}', 'API\DriverController@feedbackTrip');
      	Route::get('/book/{id}/checkstatus', 'API\DriverController@checkTripStatus');
        Route::get('/book/{id}/details', 'API\DriverController@getAppointmentData');
        
        //Driver static pages
        Route::get('/earning/{page}', 'API\DriverController@getDriverEarning');
        Route::get('/vehicle/{id}/service', 'API\DriverController@getDriverServices');
        Route::post('/service/{id}/update', 'API\DriverController@updateDriverServices');
        Route::get('/riderRating/{id}', 'API\DriverController@getRiderRating');
        Route::get('/completed-trip/{page}', 'API\DriverController@completedTrip');
        Route::get('/canceled-trip/{page}', 'API\DriverController@canceledTrip');
        Route::get('/upcoming-trip/{page}', 'API\DriverController@upcomingTrip');
        Route::get('/vehicle-details', 'API\DriverController@vehicleDetails');
        Route::post('/vehicle/{vehicle_id}/update', 'API\DriverController@updateVehicleDetails');
        Route::post('/driver-Comments', 'API\DriverController@driverComments');
        Route::post('/abn', 'API\DriverController@driverAbn');
        Route::post('/bank', 'API\DriverController@driverBank');
        Route::get('/bank', 'API\DriverController@getDriverBank');
        Route::get('/documents', 'API\DriverController@getDocuments');
        Route::post('/documents/{document_id}', 'API\DriverController@updateDocuments');
        Route::post('/support', 'API\DriverController@putSupport');
        Route::get('/today-trips-stat', 'API\DriverController@getTripStat');
        Route::get('/profile-info', 'API\DriverController@getDriverProfile');
        Route::get('/driver-feedback/{page}', 'API\DriverController@getDriverFeedback');
        Route::get('/last-trip', 'API\DriverController@getDriverLastTrip');
        Route::get('/driving-time', 'API\DriverController@getDrivingTime');
        Route::get('/start-offline-time', 'API\DriverController@startOfflineTime');
        Route::get('/running-book/{book_id}', 'API\DriverController@getRunningBook');
        Route::get('/acceptance-rate', 'API\DriverController@getAcceptanceRate');
        Route::get('/weekly-summary', 'API\DriverController@getWeeklySummary');
        Route::get('/driver-rating-stat', 'API\DriverController@getRatingStat');
        Route::post('/add_queue', 'API\DriverController@add_queue');
        Route::get('/remove_queue', 'API\DriverController@remove_queue');
        Route::get('/peaktime', 'API\DriverController@getPeaktime');
        Route::get('/inbox', 'API\DriverController@inbox');
        Route::get('/tap-depart/{book_id}', 'API\DriverController@driverStartTrip');
        Route::get('/trip-detail/{book_id}', 'API\DriverController@getDriverTripDetails');
        Route::post('/tip-thanks', 'API\DriverController@putTipThanksMessage');
        Route::get('/unread-messages', 'API\DriverController@driverUnreadMessagesCount');
        Route::post('/mesaageToRider', 'API\DriverController@sendMesaageToRider');
        Route::post('/make-call-driver', 'API\DriverController@MakeCallToRider');
        Route::get('/avialableDrivingTime', 'API\DriverController@avialableDrivingTime');
        Route::get('/checkDrivingTime', 'API\DriverController@checkDrivingTime');
        Route::get('/quepos', 'API\DriverController@quepos');
        Route::post('/notifyRiderRemainTime', 'API\DriverController@notifyRiderRemainTime');
        Route::get('/listAirportQueue/{page}', 'API\DriverController@airportQueueDetails');

        // delete user for account deleteion 
        
        Route::post('/delete-account', 'API\DriverController@deleteAccount');
    });
});
