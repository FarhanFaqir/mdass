<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ServiceOrderController;
use App\Models\Location;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () { 
    $locations = Location::get();
    $id = Auth::id();
    if(!$id) $id = 0;
    return view('index', compact('locations', 'id'));
    // return view('index'); 
});

Route::get('/contact', function () { return view('contact'); });

Route::get('/gallery', function () { return view('gallery'); });

Route::get('/map', function () { 
    $locations = Location::get();
    $id = Auth::id();
    if(!$id) $id = 0;
    return view('map', compact('locations', 'id'));
 });

// Creating a group middleware for super admin to manage users
Route::group(['middleware' => ['auth']], function () {

    // Route for getting dashboard 
    Route::get('admin/dashboard', [HomeController::class, 'index'])->name('dashboard');

    //Route for getting users
    Route::get('/admin/users', [UserController::class, 'index']);
    //Route for register user 
    Route::get('/admin/register', [UserController::class, 'create']);
    //Post route for register user 
    Route::post('/admin/register', [UserController::class, 'store']);
    //Route for get user update form 
    Route::get('/admin/user/editUser', function (Request $req) {
        $user = User::find($req->id);
        return view('admin/user/editUser', ['user' => $user]);
    });
    //Post route for updating user 
    Route::post('/admin/user/update', [UserController::class, 'update']);
    //Route for register user 
    Route::get('/admin/user/delete', [UserController::class, 'delete']);
});

Route::group(['middleware' => ['auth']], function () {

    // Location resource
    Route::get('/admin/location/search', [LocationController::class, 'search']);
    Route::post('/admin/location/filter', [LocationController::class, 'searchFilter']);
    Route::get('/search', [LocationController::class, 'index']);
    Route::post('/search', [LocationController::class, 'searchFilterFromPage']);
    Route::resource('admin/location', 'App\Http\Controllers\LocationController');

    
    Route::get('/admin/customer/getCustomers', [CustomerController::class, 'getCustomers']);
    Route::resource('admin/customer', 'App\Http\Controllers\CustomerController');
    // Service Order
    Route::post('/admin/serviceorder', [ServiceOrderController::class, 'store']);
    Route::resource('admin/serviceorder', 'App\Http\Controllers\ServiceOrderController');
    // Check In
    Route::resource('admin/checkin', 'App\Http\Controllers\CheckinController');
    // Reservation
    Route::resource('admin/reservation', 'App\Http\Controllers\ReservationController');
    // Check Out
    Route::resource('admin/checkout', 'App\Http\Controllers\CheckoutController');
    Route::post('admin/checkout/ajaxcheckout', [CheckoutController::class, 'ajaxCheckout']);




    // Role Resource
    Route::resource('roles', 'App\Http\Controllers\RoleController');
    Route::get('/role/delete', [App\Http\Controllers\RoleController::class, 'delete']);

});

require __DIR__ . '/auth.php';
