<?php

// use App\Models\Listing;
// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\UserController;
// use App\Http\Controllers\ListingController;


use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;

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
//get and show all listings
Route::get('/', [ListingController::class, 'index']);


// show create form
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');


// to store listing data
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');

//the edit forms
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

// save edited form
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');

// delete listing
Route::delete('/listings/{listing}', [ListingController::class, 'remove'])->middleware('auth');

// single listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);

//show register/create form
Route::get('/register', [UserController::class, 'register'])->middleware('guest');

// create a new user//
Route::post("/users", [UserController::class, 'store']);

/// get user out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// show login form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
// login route

Route::post('/users/authenticate', [UserController::class, 'authenticate']); 

//
