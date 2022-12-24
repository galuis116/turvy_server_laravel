<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Setting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;

use Illuminate\Support\Facades\Mail;
use App\Mail\DriverEmailVerification;

use App\Driver;

Route::get('/cache-clear', function () {


    Artisan::call('config:cache');

    Artisan::call('cache:clear');

    Artisan::call('view:clear');

    Artisan::call('queue:restart');

    return "Cache clear";
});

Route::get('test', function () {

    $driver = Driver::create([
        'first_name' => 'first',
        'last_name' => 'ast',
        'gender' => 1,
        'email' => 'monolit2048@gmail.com',
        'mobile' => '123',
        'mobile_verified_at' => date('Y-m-d H:i:s'),
        'country_id' => 13,
        'state_id' => 2,
        'city_id' => 11,
        'password' => Hash::make('password'),

    ]);

    //Mail::to($driver->email)->send(new DriverEmailVerification($driver));

    return view('emails.register-driver-email')
        ->with([
            'verification_code' => encrypt($driver->id),
        ]);
});

Route::get('/', 'HomeController@index')->name('index');
Route::get('/charity', 'HomeController@charity')->name('charity');
// Route::get('/contact', 'HomeController@contact')->name('contact');
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/terms', 'HomeController@terms')->name('terms');
Route::get('/policy', 'HomeController@policy')->name('policy');
Route::post('/feedback', 'HomeController@feedback')->name('feedback');
Route::get('/login-guide', 'HomeController@loginGuide')->name('login.guide');
Route::get('/register-guide', 'HomeController@registerGuide')->name('register.guide');

//- Common API -//
Route::get('/getModelByMake', 'CommonController@getModelByMake')->name('getModelByMake');
Route::get('/getModelByServicetype', 'CommonController@getModelByServicetype')->name('getModelByServicetype');
Route::get('/getAllModel', 'CommonController@getAllModel')->name('getAllModel');
Route::get('/getServiceTypeByModel', 'CommonController@getServiceTypeByModel')->name('getServiceTypeByModel');
Route::get('/getStatesBelongCountry', 'CommonController@getStatesBelongCountry')->name('getStatesBelongCountry');
Route::get('/getCitiesBelongState', 'CommonController@getCitiesBelongState')->name('getCitiesBelongState');
Route::get('/getFarecard', 'CommonController@getFarecard')->name('getFarecard');
Route::get('/getServiceTypeByState', 'CommonController@getServiceTypeByState')->name('getServiceTypeByState');
Route::get('/getFarecardByServicetype', 'CommonController@getFarecardByServicetype')->name('getFarecardByServicetype');
Route::get('/getUsersByType', 'CommonController@getUsersByType')->name('getUsersByType');
Route::get('/getDetailsByPhone', 'CommonController@getDetailsByPhone')->name('getDetailsByPhone');
Route::get('/getDriverByLocation', 'CommonController@getDriverByLocation')->name('getDriverByLocation');
Route::get('/getEstimate', 'CommonController@getEstimate')->name('getEstimate');

Route::get('/getOTP', 'CommonController@getOTP')->name('getOTP');
Route::get('/getDriverOTP', 'CommonController@getDriverOTP')->name('getDriverOTP');
Route::get('/getPartnerOTP', 'CommonController@getPartnerOTP')->name('getPartnerOTP');
Route::get('/getRiderRegisterOTP', 'CommonController@getRiderRegisterOTP')->name('getRiderRegisterOTP');
Route::get('/getDriverRegisterOTP', 'CommonController@getDriverRegisterOTP')->name('getDriverRegisterOTP');
Route::get('/checkOTP', 'CommonController@checkOTP')->name('checkOTP');

Route::get('/email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('/email/verify/{id}/{type}', 'Auth\LoginController@verifyMail')->name('verification.verify');
Route::get('/email/resend', 'Auth\VerificationController@resend')->name('verification.resend');

//- Admin panel -//
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', function () {
        return redirect()->route('admin.dashboard');
    })->name('admin');
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('login');
    Route::post('/logout', 'Auth\AdminLoginController@logout')->name('logout');
    Route::get('/password/reset', 'Auth\AdminForgotPaswordController@showLinkRequestForm')->name('password.request');
    Route::post('/password/email', 'Auth\AdminForgotPaswordController@sendresetEmail')->name('admin.passemail');
    Route::get('password/reset/{token}', 'Auth\AdminForgotPaswordController@showResetForm')->name('password.reset.admin');
    Route::post('password/reset/{token}', 'Auth\AdminForgotPaswordController@showResetForm')->name('password.reset.admin');

    Route::resource('roles', 'Admin\RoleController')->middleware(['auth:admin']);


    Route::get('/dashboard', 'Admin\DashboardController@index')->name('dashboard');

    Route::group(['prefix' => 'cms', 'as' => 'cms.'], function () {
        Route::get('/banner', 'Admin\CMSController@banner')->name('banner');
        Route::post('/banner', 'Admin\CMSController@storeBanner')->name('banner');

        Route::get('/charity', 'Admin\CMSController@charity')->name('charity');
        Route::post('/charity', 'Admin\CMSController@storeCharity')->name('charity');

        Route::get('/about', 'Admin\CMSController@about')->name('about');
        Route::post('/about', 'Admin\CMSController@storeAbout')->name('about');

        Route::get('/home', 'Admin\CMSController@home')->name('home');
        Route::post('/home', 'Admin\CMSController@storeHome')->name('home');

        Route::get('/policy', 'Admin\CMSController@policy')->name('policy');
        Route::post('/policy', 'Admin\CMSController@storePolicy')->name('policy');

        Route::get('/footer', 'Admin\CMSController@footer')->name('footer');
        Route::post('/footer', 'Admin\CMSController@storeFooter')->name('footer');

        Route::get('/social', 'Admin\CMSController@social')->name('social');
        Route::post('/social', 'Admin\CMSController@storeSocial')->name('social');

        Route::get('/terms', 'Admin\CMSController@terms')->name('terms');
        Route::post('/terms', 'Admin\CMSController@storeTerms')->name('terms');
    });

    Route::group(['prefix' => 'fleet', 'as' => 'fleet.'], function () {
        Route::group(['prefix' => 'make', 'as' => 'make.'], function () {
            Route::get('/list', 'Admin\FleetController@makeList')->name('list');
            Route::get('/add', 'Admin\FleetController@addMake')->name('add');
            Route::post('/add', 'Admin\FleetController@storeMake')->name('store');
            Route::get('/{id}/edit', 'Admin\FleetController@editMake')->name('edit');
            Route::post('/{id}/update', 'Admin\FleetController@updateMake')->name('update');
            Route::get('/{id}/active', 'Admin\FleetController@activeMake')->name('active');
            Route::get('/{id}/delete', 'Admin\FleetController@deleteMake')->name('delete');
        });
        Route::group(['prefix' => 'model', 'as' => 'model.'], function () {
            Route::get('/list', 'Admin\FleetController@modelList')->name('list');
            Route::get('/add', 'Admin\FleetController@addModel')->name('add');
            Route::post('/add', 'Admin\FleetController@storeModel')->name('store');
            Route::get('/{id}/edit', 'Admin\FleetController@editModel')->name('edit');
            Route::post('/{id}/update', 'Admin\FleetController@updateModel')->name('update');
            Route::get('/{id}/active', 'Admin\FleetController@activeModel')->name('active');
            Route::get('/{id}/delete', 'Admin\FleetController@deleteModel')->name('delete');
        });
        Route::group(['prefix' => 'serviceType', 'as' => 'serviceType.'], function () {
            Route::get('/list', 'Admin\FleetController@serviceTypeList')->name('list');
            Route::get('/add', 'Admin\FleetController@addServiceType')->name('add');
            Route::post('/add', 'Admin\FleetController@storeServiceType')->name('store');
            Route::get('/{id}/edit', 'Admin\FleetController@editServiceType')->name('edit');
            Route::post('/{id}/update', 'Admin\FleetController@updateServiceType')->name('update');
            Route::get('/{id}/active', 'Admin\FleetController@activeServiceType')->name('active');
            Route::get('/{id}/delete', 'Admin\FleetController@deleteServiceType')->name('delete');
        });
        Route::group(['prefix' => 'rideType', 'as' => 'rideType.'], function () {
            Route::get('/list', 'Admin\FleetController@rideTypeList')->name('list');
            Route::get('/add', 'Admin\FleetController@addRideType')->name('add');
            Route::post('/add', 'Admin\FleetController@storeRideType')->name('store');
            Route::get('/{id}/edit', 'Admin\FleetController@editRideType')->name('edit');
            Route::post('/{id}/update', 'Admin\FleetController@updateRideType')->name('update');
            Route::get('/{id}/active', 'Admin\FleetController@activeRideType')->name('active');
            Route::get('/{id}/delete', 'Admin\FleetController@deleteRideType')->name('delete');
        });
    });

    Route::group(['prefix' => 'region', 'as' => 'region.'], function () {
        Route::group(['prefix' => 'country', 'as' => 'country.'], function () {
            Route::get('/list', 'Admin\RegionController@countryList')->name('list');
            Route::get('/add', 'Admin\RegionController@addCountry')->name('add');
            Route::post('/add', 'Admin\RegionController@storeCountry')->name('store');
            Route::get('/{id}/edit', 'Admin\RegionController@editCountry')->name('edit');
            Route::post('/{id}/update', 'Admin\RegionController@updateCountry')->name('update');
            Route::get('/{id}/delete', 'Admin\RegionController@deleteCountry')->name('delete');
        });
        Route::group(['prefix' => 'state', 'as' => 'state.'], function () {
            Route::get('/list', 'Admin\RegionController@stateList')->name('list');
            Route::get('/add', 'Admin\RegionController@addState')->name('add');
            Route::post('/add', 'Admin\RegionController@storeState')->name('store');
            Route::get('/{id}/edit', 'Admin\RegionController@editState')->name('edit');
            Route::post('/{id}/update', 'Admin\RegionController@updateState')->name('update');
            Route::get('/{id}/delete', 'Admin\RegionController@deleteState')->name('delete');
        });
        Route::group(['prefix' => 'city', 'as' => 'city.'], function () {
            Route::get('/list', 'Admin\RegionController@cityList')->name('list');
            Route::get('/add', 'Admin\RegionController@addCity')->name('add');
            Route::post('/add', 'Admin\RegionController@storeCity')->name('store');
            Route::get('/{id}/edit', 'Admin\RegionController@editCity')->name('edit');
            Route::post('/{id}/update', 'Admin\RegionController@updateCity')->name('update');
            Route::get('/{id}/delete', 'Admin\RegionController@deleteCity')->name('delete');
        });
    });

    Route::group(['prefix' => 'base', 'as' => 'base.'], function () {
        Route::group(['prefix' => 'currency', 'as' => 'currency.'], function () {
            Route::get('/list', 'Admin\BaseController@currencyList')->name('list');
            Route::get('/add', 'Admin\BaseController@addCurrency')->name('add');
            Route::post('/add', 'Admin\BaseController@storeCurrency')->name('store');
            Route::get('/{id}/edit', 'Admin\BaseController@editCurrency')->name('edit');
            Route::post('/{id}/update', 'Admin\BaseController@updateCurrency')->name('update');
            Route::get('/{id}/active', 'Admin\BaseController@activeCurrency')->name('active');
            Route::get('/{id}/delete', 'Admin\BaseController@deleteCurrency')->name('delete');
        });
        Route::group(['prefix' => 'distance', 'as' => 'distance.'], function () {
            Route::get('/list', 'Admin\BaseController@DistanceList')->name('list');
            Route::get('/add', 'Admin\BaseController@addDistance')->name('add');
            Route::post('/add', 'Admin\BaseController@storeDistance')->name('store');
            Route::get('/{id}/edit', 'Admin\BaseController@editDistance')->name('edit');
            Route::post('/{id}/update', 'Admin\BaseController@updateDistance')->name('update');
            Route::get('/{id}/active', 'Admin\BaseController@activeDistance')->name('active');
            Route::get('/{id}/delete', 'Admin\BaseController@deleteDistance')->name('delete');
        });
        Route::group(['prefix' => 'payment', 'as' => 'payment.'], function () {
            Route::get('/list', 'Admin\BaseController@paymentList')->name('list');
            Route::get('/add', 'Admin\BaseController@addPayment')->name('add');
            Route::post('/add', 'Admin\BaseController@storePayment')->name('store');
            Route::get('/{id}/edit', 'Admin\BaseController@editPayment')->name('edit');
            Route::post('/{id}/update', 'Admin\BaseController@updatePayment')->name('update');
            Route::get('/{id}/active', 'Admin\BaseController@activePayment')->name('active');
            Route::get('/{id}/delete', 'Admin\BaseController@deleteDistance')->name('delete');
        });
    });

    Route::group(['prefix' => 'sos', 'as' => 'sos.'], function () {
        Route::group(['prefix' => 'contact', 'as' => 'contact.'], function () {
            Route::get('/list', 'Admin\SosController@contactList')->name('list');
            Route::get('/add', 'Admin\SosController@addContact')->name('add');
            Route::post('/add', 'Admin\SosController@storeContact')->name('store');
            Route::get('/{id}/edit', 'Admin\SosController@editContact')->name('edit');
            Route::get('/{id}/active', 'Admin\SosController@activeContact')->name('active');
            Route::post('/{id}/update', 'Admin\SosController@updateContact')->name('update');
            Route::get('/{id}/delete', 'Admin\SosController@deleteContact')->name('delete');
        });
        Route::group(['prefix' => 'request', 'as' => 'request.'], function () {
            Route::get('/list', 'Admin\SosController@requestList')->name('list');
            Route::get('/{id}/delete', 'Admin\SosController@deleteRequest')->name('delete');
        });
    });

    Route::group(['prefix' => 'charge', 'as' => 'charge.'], function () {
        Route::group(['prefix' => 'fare', 'as' => 'fare.'], function () {
            Route::get('/list', 'Admin\ChargeController@fareList')->name('list');
            Route::get('/add', 'Admin\ChargeController@addFare')->name('add');
            Route::post('/add', 'Admin\ChargeController@storeFare')->name('store');
            Route::get('/{id}/edit', 'Admin\ChargeController@editFare')->name('edit');
            Route::post('/{id}/update', 'Admin\ChargeController@updateFare')->name('update');
            Route::get('/{id}/delete', 'Admin\ChargeController@deleteFare')->name('delete');
        });
        Route::group(['prefix' => 'peaktime', 'as' => 'peaktime.'], function () {
            Route::get('/list', 'Admin\ChargeController@peaktimeList')->name('list');
            Route::get('/add', 'Admin\ChargeController@addPeaktime')->name('add');
            Route::post('/add', 'Admin\ChargeController@storePeaktime')->name('store');
            Route::get('/{id}/edit', 'Admin\ChargeController@editPeaktime')->name('edit');
            Route::post('/{id}/update', 'Admin\ChargeController@updatePeaktime')->name('update');
            Route::get('/{id}/delete', 'Admin\ChargeController@deletePeaktime')->name('delete');
        });
        Route::group(['prefix' => 'nighttime', 'as' => 'nighttime.'], function () {
            Route::get('/list', 'Admin\ChargeController@nighttimeList')->name('list');
            Route::get('/add', 'Admin\ChargeController@addNighttime')->name('add');
            Route::post('/add', 'Admin\ChargeController@storeNighttime')->name('store');
            Route::get('/{id}/edit', 'Admin\ChargeController@editNighttime')->name('edit');
            Route::post('/{id}/update', 'Admin\ChargeController@updateNighttime')->name('update');
            Route::get('/{id}/delete', 'Admin\ChargeController@deleteNighttime')->name('delete');
        });
    });
    Route::group(['prefix' => 'document', 'as' => 'document.'], function () {
        Route::group(['prefix' => 'document', 'as' => 'document.'], function () {
            Route::get('/list', 'Admin\DocumentController@documentList')->name('list');
            Route::get('/add', 'Admin\DocumentController@addDocument')->name('add');
            Route::post('/add', 'Admin\DocumentController@storeDocument')->name('store');
            Route::get('/{id}/edit', 'Admin\DocumentController@editDocument')->name('edit');
            Route::get('/{id}/approve', 'Admin\DocumentController@approveDocument')->name('approve');
            Route::post('/{id}/update', 'Admin\DocumentController@updateDocument')->name('update');
            Route::get('/{id}/delete', 'Admin\DocumentController@deleteDocument')->name('delete');
        });
        Route::group(['prefix' => 'documentstate', 'as' => 'documentstate.'], function () {
            Route::get('/list', 'Admin\DocumentController@documentstateList')->name('list');
            Route::get('/add', 'Admin\DocumentController@addDocumentstate')->name('add');
            Route::post('/add', 'Admin\DocumentController@storeDocumentstate')->name('store');
            Route::get('/{id}/edit', 'Admin\DocumentController@editDocumentstate')->name('edit');
            Route::post('/{id}/update', 'Admin\DocumentController@updateDocumentstate')->name('update');
            Route::get('/{id}/delete', 'Admin\DocumentController@deleteDocumentstate')->name('delete');
        });
    });
    Route::group(['prefix' => 'airportride', 'as' => 'airportride.'], function () {
        Route::group(['prefix' => 'airport', 'as' => 'airport.'], function () {
            Route::get('/list', 'Admin\AirportController@index')->name('index');
            Route::get('/add', 'Admin\AirportController@create')->name('add');
            Route::post('/add', 'Admin\AirportController@store')->name('store');
            Route::get('/{id}/edit', 'Admin\AirportController@edit')->name('edit');
            Route::get('/{id}/approve', 'Admin\AirportController@approve')->name('approve');
            Route::post('/{id}/update', 'Admin\AirportController@update')->name('update');
            Route::get('/{id}/delete', 'Admin\AirportController@destroy')->name('delete');
        });
        Route::group(['prefix' => 'destination', 'as' => 'destination.'], function () {
            Route::get('/list', 'Admin\DestinationController@index')->name('index');
            Route::get('/add', 'Admin\DestinationController@create')->name('add');
            Route::post('/add', 'Admin\DestinationController@store')->name('store');
            Route::get('/{id}/edit', 'Admin\DestinationController@edit')->name('edit');
            Route::get('/{id}/approve', 'Admin\DestinationController@approve')->name('approve');
            Route::post('/{id}/update', 'Admin\DestinationController@update')->name('update');
            Route::get('/{id}/delete', 'Admin\DestinationController@destroy')->name('delete');
        });
        Route::group(['prefix' => 'pricing', 'as' => 'pricing.'], function () {
            Route::get('/list', 'Admin\AirportPricingController@index')->name('index');
            Route::get('/add', 'Admin\AirportPricingController@create')->name('add');
            Route::post('/add', 'Admin\AirportPricingController@store')->name('store');
            Route::get('/{id}/edit', 'Admin\AirportPricingController@edit')->name('edit');
            Route::get('/{id}/approve', 'Admin\AirportPricingController@approve')->name('approve');
            Route::post('/{id}/update', 'Admin\AirportPricingController@update')->name('update');
            Route::get('/{id}/delete', 'Admin\AirportPricingController@destroy')->name('delete');
        });
    });
    Route::group(['prefix' => 'queue', 'as' => 'queue.'], function () {
        Route::get('/index', 'Admin\QueueController@index')->name('index');
    });
    Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
        Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
            Route::get('/list', 'Admin\SubAdminController@adminList')->name('list');
            Route::get('/add', 'Admin\SubAdminController@addAdmin')->name('add');
            Route::post('/add', 'Admin\SubAdminController@storeAdmin')->name('store');
            Route::get('/{id}/edit', 'Admin\SubAdminController@editAdmin')->name('edit');
            Route::get('/{id}/approve', 'Admin\SubAdminController@approveAdmin')->name('approve');
            Route::post('/{id}/update', 'Admin\SubAdminController@updateAdmin')->name('update');
            Route::get('/{id}/delete', 'Admin\SubAdminController@deleteAdmin')->name('delete');
        });
        Route::group(['prefix' => 'rider', 'as' => 'rider.'], function () {
            Route::get('/list', 'Admin\RiderController@riderList')->name('list');
            Route::get('/add', 'Admin\RiderController@addRider')->name('add');
            Route::post('/add', 'Admin\RiderController@storeRider')->name('store');
            Route::get('/{id}/show', 'Admin\RiderController@showRider')->name('show');
            Route::get('/{id}/edit', 'Admin\RiderController@editRider')->name('edit');
            Route::get('/{id}/approve', 'Admin\RiderController@approveRider')->name('approve');
            Route::post('/{id}/update', 'Admin\RiderController@updateRider')->name('update');
            Route::get('/{id}/delete', 'Admin\RiderController@deleteRider')->name('delete');
        });
        Route::group(['prefix' => 'driver', 'as' => 'driver.'], function () {
            Route::get('/list', 'Admin\DriverController@driverList')->name('list');
            Route::get('/add', 'Admin\DriverController@addDriver')->name('add');
            Route::post('/add', 'Admin\DriverController@storeDriver')->name('store');
            Route::post('/{id}/note', 'Admin\DriverController@storeNote')->name('note');
            Route::get('/{id}/note/delete', 'Admin\DriverController@deleteNote')->name('note.delete');
            Route::get('/{id}/show', 'Admin\DriverController@showDriver')->name('show');
            Route::get('/{id}/edit', 'Admin\DriverController@editDriver')->name('edit');
            Route::get('/{id}/approve', 'Admin\DriverController@approveDriver')->name('approve');
            Route::post('/{id}/update', 'Admin\DriverController@updateDriver')->name('update');
            Route::get('/{id}/delete', 'Admin\DriverController@deleteDriver')->name('delete');
        });
        Route::group(['prefix' => 'partner', 'as' => 'partner.'], function () {
            Route::get('/list', 'Admin\PartnerController@partnerList')->name('list');
            Route::get('/add', 'Admin\PartnerController@addPartner')->name('add');
            Route::post('/add', 'Admin\PartnerController@storePartner')->name('store');
            Route::get('/{id}/show', 'Admin\PartnerController@showPartner')->name('show');
            Route::get('/{id}/edit', 'Admin\PartnerController@editPartner')->name('edit');
            Route::get('/{id}/approve', 'Admin\PartnerController@approvePartner')->name('approve');
            Route::post('/{id}/update', 'Admin\PartnerController@updatePartner')->name('update');
            Route::get('/{id}/delete', 'Admin\PartnerController@deletePartner')->name('delete');
        });
    });

    Route::group(['prefix' => 'maps', 'as' => 'maps.'], function () {
        Route::get('/usermap', 'Admin\StatsMapController@usermap')->name('usermap');
        Route::get('/drivermap', 'Admin\StatsMapController@drivermap')->name('drivermap');
        Route::get('/drveraval_data', 'Admin\StatsMapController@drveraval_data')->name('drveraval_data');
        Route::get('/driverairport', 'Admin\StatsMapController@driverairport')->name('driverairport');
        Route::get('/heatmap', 'Admin\StatsMapController@heatmap')->name('heatmap');
    });

    Route::group(['prefix' => 'comment', 'as' => 'comment.'], function () {
        Route::get('/list', 'Admin\CommentController@commentList')->name('list');
        Route::get('/{id}/edit', 'Admin\CommentController@editComment')->name('edit');
        Route::get('/{id}/publish', 'Admin\CommentController@publishComment')->name('publish');
        Route::post('/{id}/update', 'Admin\CommentController@updateComment')->name('update');
        Route::get('/{id}/delete', 'Admin\CommentController@deleteComment')->name('delete');
    });

    Route::group(['prefix' => 'feedback', 'as' => 'feedback.'], function () {
        Route::get('/list', 'Admin\FeedbackController@feedbackList')->name('list');
        Route::get('/{id}/delete', 'Admin\FeedbackController@deleteFeedback')->name('delete');
    });

    Route::group(['prefix' => 'tansaction', 'as' => 'transaction.'], function () {
        Route::get('/index', 'Admin\TransactionController@index')->name('index');
    });

    Route::group(['prefix' => 'riderequest', 'as' => 'riderequest.'], function () {
        Route::get('/index', 'Admin\RideController@request')->name('index');
    });

    Route::group(['prefix' => 'setting', 'as' => 'setting.'], function () {
        Route::get('/index', 'Admin\SettingController@index')->name('index');
        Route::post('/store', 'Admin\SettingController@store')->name('store');
    });

    Route::group(['prefix' => 'email', 'as' => 'email.'], function () {
        Route::get('/signup', 'Admin\EmailController@signup')->name('signup');
        Route::post('/signup', 'Admin\EmailController@storeSignup')->name('signup');
        Route::get('/invoice', 'Admin\EmailController@invoice')->name('invoice');
        Route::post('/invoice', 'Admin\EmailController@storeInvoice')->name('invoice');
    });

    Route::group(['prefix' => 'booking', 'as' => 'booking.'], function () {
        Route::get('/index', 'Admin\BookingController@index')->name('index');
        Route::post('/store', 'Admin\BookingController@store')->name('store');
    });

    Route::group(['prefix' => 'ride', 'as' => 'ride.'], function () {
        Route::group(['prefix' => 'active', 'as' => 'active.'], function () {
            Route::get('/list/{flag}', 'Admin\RideController@activeRides')->name('list');
            Route::post('/cancel', 'Admin\RideController@cancel')->name('cancel');
            Route::post('/assignDriver', 'Admin\RideController@assignDriver')->name('assignDriver');
            Route::get('/track/{id}', 'Admin\RideController@trackRide')->name('track');
        });
        Route::group(['prefix' => 'completed', 'as' => 'completed.'], function () {
            Route::get('/list/{flag}', 'Admin\RideController@completedRides')->name('list');
        });
    });

    Route::group(['prefix' => 'point', 'as' => 'point.'], function () {
        Route::group(['prefix' => 'reward', 'as' => 'reward.'], function () {
            Route::get('/list', 'Admin\PointController@rewards')->name('list');
            Route::get('/add', 'Admin\PointController@addReward')->name('add');
            Route::post('/add', 'Admin\PointController@storeReward')->name('add');
            Route::get('/{id}/edit', 'Admin\PointController@editReward')->name('edit');
            Route::post('/{id}/update', 'Admin\PointController@updateReward')->name('update');
            Route::get('/{id}/delete', 'Admin\PointController@deleteReward')->name('delete');
            Route::get('/order/{id}/up', 'Admin\PointController@upOrder')->name('order.up');
            Route::get('/order/{id}/down', 'Admin\PointController@downOrder')->name('order.down');
        });
        Route::group(['prefix' => 'loyalty', 'as' => 'loyalty.'], function () {
            Route::get('/list', 'Admin\PointController@loyalties')->name('list');
            Route::get('/add', 'Admin\PointController@addLoyalty')->name('add');
            Route::post('/add', 'Admin\PointController@storeLoyalty')->name('add');
            Route::get('/{id}/edit', 'Admin\PointController@editLoyalty')->name('edit');
            Route::post('/{id}/update', 'Admin\PointController@updateLoyalty')->name('update');
            Route::get('/{id}/delete', 'Admin\PointController@deleteLoyalty')->name('delete');
        });
    });

    Route::group(['prefix' => 'ad', 'as' => 'ad.'], function () {
        Route::get('/list', 'Admin\AdController@adList')->name('list');
        Route::get('/add', 'Admin\AdController@addAd')->name('add');
        Route::post('/add', 'Admin\AdController@storeAd')->name('store');
        Route::get('/{id}/edit', 'Admin\AdController@editAd')->name('edit');
        Route::get('/{id}/publish', 'Admin\AdController@activeAd')->name('publish');
        Route::post('/{id}/update', 'Admin\AdController@updateAd')->name('update');
        Route::get('/{id}/delete', 'Admin\AdController@deleteAd')->name('delete');
    });

    Route::group(['prefix' => 'coupon', 'as' => 'coupon.'], function () {
        Route::get('/list', 'Admin\CouponController@couponList')->name('list');
        Route::get('/add', 'Admin\CouponController@addCoupon')->name('add');
        Route::post('/add', 'Admin\CouponController@storeCoupon')->name('store');
        Route::get('/{id}/edit', 'Admin\CouponController@editCoupon')->name('edit');
        Route::get('/{id}/active', 'Admin\CouponController@activeCoupon')->name('active');
        Route::post('/{id}/update', 'Admin\CouponController@updateCoupon')->name('update');
        Route::get('/{id}/delete', 'Admin\CouponController@deleteCoupon')->name('delete');
    });

    Route::group(['prefix' => 'cancelreason', 'as' => 'cancelreason.'], function () {
        Route::group(['prefix' => 'rider', 'as' => 'rider.'], function () {
            Route::get('/list', 'Admin\CancelreasonController@index')->name('list');
            Route::get('/add', 'Admin\CancelreasonController@add')->name('add');
            Route::post('/add', 'Admin\CancelreasonController@store')->name('store');
            Route::get('/{id}/edit', 'Admin\CancelreasonController@edit')->name('edit');
            Route::post('/{id}/update', 'Admin\CancelreasonController@update')->name('update');
            Route::get('/{id}/delete', 'Admin\CancelreasonController@delete')->name('delete');
        });
        Route::group(['prefix' => 'driver', 'as' => 'driver.'], function () {
            Route::get('/list', 'Admin\CancelreasonController@indexDriver')->name('list');
            Route::get('/add', 'Admin\CancelreasonController@addDriver')->name('add');
            Route::post('/add', 'Admin\CancelreasonController@storeDriver')->name('store');
            Route::get('/{id}/edit', 'Admin\CancelreasonController@editDriver')->name('edit');
            Route::post('/{id}/update', 'Admin\CancelreasonController@updateDriver')->name('update');
            Route::get('/{id}/delete', 'Admin\CancelreasonController@deleteDriver')->name('delete');
        });
    });

    Route::group(['prefix' => 'notification', 'as' => 'notification.'], function () {
        Route::get('/index', 'Admin\NotificationController@index')->name('index');
        Route::post('/store', 'Admin\NotificationController@store')->name('store');
    });

    Route::group(['prefix' => 'rating', 'as' => 'rating.'], function () {
        Route::get('/driver', 'Admin\RatingController@driver')->name('driver');
        Route::get('/driver/{id}/changeStatus', 'Admin\RatingController@driverChangeStatus')->name('driver.status');
        Route::get('/rider', 'Admin\RatingController@rider')->name('rider');
        Route::get('/rider/{id}/changeStatus', 'Admin\RatingController@riderChangeStatus')->name('rider.status');
    });
});

//- Rider -//
Route::prefix('rider')->group(function () {
    Route::get('/', function () {
        return redirect()->route('rider.dashboard');
    })->name('rider');
    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('rider.login');
    Route::post('/login', 'Auth\LoginController@login')->name('rider.login');
    Route::post('/logout', 'Auth\LoginController@logout')->name('rider.logout');
    Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('rider.register');
    Route::post('/register', 'Auth\RegisterController@register')->name('rider.register');

    Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('rider.password.request');
    Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('rider.password.email');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset.admin');
    
    Route::get('/email/verify', 'Auth\VerificationController@show')->name('rider.verification.notice');
    Route::get('/email/verify/{id}/{type}', 'Auth\LoginController@verifyMail')->name('rider.verification.verify');
    Route::get('/email/resend', 'Auth\VerificationController@resend')->name('rider.verification.resend');
    Route::get('/verify', 'Auth\DriverRegisterController@verify')->name('rider.verify');


    Route::middleware(['verified'])->group(function () {
        Route::get('/dashboard', 'Rider\DashboardController@index')->name('rider.dashboard');
        Route::get('/booking', 'Rider\AppointmentController@index')->name('rider.booking');
        Route::post('/book', 'Rider\AppointmentController@store')->name('rider.book');
        Route::get('/trips', 'Rider\TripController@index')->name('rider.trips');
        Route::get('/wallet', 'Rider\WalletController@index')->name('rider.wallet');
        Route::get('/charity', 'Rider\CharityController@index')->name('rider.charity');
        Route::get('/payments/{id}', 'Rider\EarnController@index')->name('rider.payments');
        Route::get('/ratecard', 'Rider\RateCardController@index')->name('rider.ratecard');
        Route::post('/profile', 'Rider\ProfileController@update')->name('rider.profile');
        Route::get('/support', 'Rider\SupportController@index')->name('rider.support');
        Route::post('/support', 'Rider\SupportController@store')->name('rider.support');
        Route::get('/comment', 'Rider\CommentController@index')->name('rider.comment');
        Route::post('/comment', 'Rider\CommentController@store')->name('rider.comment');
        Route::get('/messages', 'Rider\MessagesController@index')->name('rider.messages');
        Route::get('/myrecepits/{page_id}', 'Rider\TripController@myrecepits')->name('rider.myrecepits');
        Route::get('/receipt/{book_id}', 'Rider\TripController@receipt')->name('rider.receipt');
    });
});

//- Driver -//
Route::prefix('driver')->group(function () {
    Route::get('/', function () {
        return redirect()->route('driver.dashboard');
    })->name('driver');
    Route::get('/login', 'Auth\DriverLoginController@showLoginForm')->name('driver.login');
    Route::post('/login', 'Auth\DriverLoginController@login')->name('driver.login');
    Route::post('/logout', 'Auth\DriverLoginController@logout')->name('driver.logout');
    Route::get('/register', 'Auth\DriverRegisterController@showRegistrationForm')->name('driver.register');
    Route::post('/register', 'Auth\DriverRegisterController@register')->name('driver.register');

    Route::get('/email/verify', 'Auth\VerificationController@show')->name('driver.verification.notice');
    Route::get('/email/verify/{id}/{type}', 'Auth\LoginController@verifyMail')->name('driver.verification.verify');
    //  Route::get('/email/verify/{id}', function($id){
    //     return decrypt($id);
    //  })->name('driver.verification.verify');
    Route::get('/email/resend', 'Auth\VerificationController@resend')->name('driver.verification.resend');

    Route::get('/verify', 'Auth\DriverRegisterController@verify')->name('driver.verify');
    Route::post('/verify', 'Auth\DriverRegisterController@verifyProcess')->name('driver.verify');
    Route::get('/password/reset', 'Auth\DriverForgotPaswordController@showLinkRequestForm')->name('driver.password.request');
	 Route::post('/password/email', 'Auth\DriverForgotPaswordController@sendresetEmail')->name('driver.password.email');
	  //Route::post('/password/email', 'Auth\AdminForgotPaswordController@sendresetEmail')->name('admin.passemail');
    Route::get('password/reset/{token}', 'Auth\DriverForgotPaswordController@showResetForm')->name('password.reset.driver');
    Route::post('password/reset/{token}', 'Auth\DriverForgotPaswordController@showResetForm')->name('password.reset.driver');
	 
    Route::middleware(['verified'])->group(function () {
        Route::get('/dashboard', 'Driver\DashboardController@index')->name('driver.dashboard');
        Route::get('/profile', 'Driver\ProfileController@index')->name('driver.profile');
        Route::post('/profile', 'Driver\ProfileController@update')->name('driver.profile');
        Route::get('/trips', 'Driver\TripController@index')->name('driver.trips');
        ROute::get('/earnings', 'Driver\EarnController@index')->name('driver.payments');
        Route::get('/changepassword', 'Driver\ProfileController@changepassword')->name('driver.changepassword');
        Route::post('/changepassword', 'Driver\ProfileController@resetpassword')->name('driver.changepassword');
        Route::get('/support', 'Driver\SupportController@index')->name('driver.support');
        Route::post('/support', 'Driver\SupportController@store')->name('driver.support');
        Route::get('/bank', 'Driver\BankController@index')->name('driver.bank');
        Route::post('/bank', 'Driver\BankController@update')->name('driver.bank');
        Route::get('/document', 'Driver\DocumentController@index')->name('driver.document');
        Route::post('/document', 'Driver\DocumentController@update')->name('driver.document');
        Route::get('/abn', 'Driver\ABNController@index')->name('driver.abn');
        Route::post('/abn', 'Driver\ABNController@store')->name('driver.abn');
        Route::get('/vehicle', 'Driver\VehicleController@index')->name('driver.vehicle');
        Route::post('/vehicle', 'Driver\VehicleController@store')->name('driver.vehicle');
        Route::get('/comment', 'Driver\CommentController@index')->name('driver.comment');
        Route::post('/comment', 'Driver\CommentController@store')->name('driver.comment');
        Route::get('/inbox', 'Driver\ProfileController@inbox')->name('driver.inbox');
    });
});

//- Partner -//
Route::prefix('partner')->group(function () {
    Route::get('/', function () {
        return redirect()->route('partner.dashboard');
    })->name('partner');
    Route::get('/login', 'Auth\PartnerLoginController@showLoginForm')->name('partner.login');
    Route::post('/login', 'Auth\PartnerLoginController@login')->name('partner.login');
    Route::post('/logout', 'Auth\PartnerLoginController@logout')->name('partner.logout');
    Route::get('/register', 'Auth\PartnerRegisterController@showRegistrationForm')->name('partner.register');
    Route::post('/register', 'Auth\PartnerRegisterController@register')->name('partner.register');
    Route::get('/password/reset', 'Auth\PartnerForgotPasswordController@showLinkRequestForm')->name('partner.password.request');
    Route::get('/dashboard', 'Partner\DashboardController@index')->name('partner.dashboard');

    Route::get('/profile', 'Partner\ProfileController@index')->name('partner.profile');
    Route::post('/profile', 'Partner\ProfileController@update')->name('partner.profile');
    Route::post('/contact', 'Partner\ContactController@update')->name('partner.contact');
    Route::post('/bank', 'Partner\BankController@update')->name('partner.bank');
    Route::post('/changePassword', 'Partner\ProfileController@changePassword')->name('partner.changePassword');
    Route::get('/rider', 'Partner\RiderController@index')->name('partner.rider');
    Route::get('/invite', 'Partner\InviteController@index')->name('partner.invite');
    Route::post('/invite', 'Partner\InviteController@store')->name('partner.invite');
    Route::get('/revenue', 'Partner\RevenueController@index')->name('partner.revenue');
    Route::get('/comment', 'Partner\CommentController@index')->name('partner.comment');
    Route::post('/comment', 'Partner\CommentController@store')->name('partner.comment');
});

//Auth::routes();

if (Schema::hasTable('settings')) {
    $settings = Setting::all();
    $results = [];
    foreach ($settings as $setting) {
        $results[$setting->key] = $setting->value;
    }
} else {
    $results = [];
}
View::share('settings', $results);
