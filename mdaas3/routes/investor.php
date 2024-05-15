<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Psy\TabCompletion\Matcher\FunctionsMatcher;

Route::get('/submit', 'App\Http\Controllers\investorController@submit');

// Route::get('/viewInvestor', function () {
//     return view('admin/investor/viewInvestor');
// })->middleware(['auth']);

// Creating a group middleware to authorize users on accessing private pages
Route::group(['middleware' => ['auth']], function () {
   
});

// Route::get('/submit', 'App\Http\Controllers\investorController@submit');

