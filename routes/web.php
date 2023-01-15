<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\ModelController;
use App\Http\Controllers\ListingController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::post('register_check', [AuthController::class, 'register_check'])->name('register_check');
Route::post('login_check', [AuthController::class, 'login_check'])->name('login_check');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::post('changePassword', [AuthController::class, 'changePassword'])->name('changePassword');

Route::get('ads', [HomeController::class, 'viewAds'])->name('ads');
Route::get('myAds', [HomeController::class, 'totalAds'])->name('myAds')->middleware('guard');
Route::get('profile', [HomeController::class, 'userProfile'])->name('profile')->middleware('guard');
Route::post('profile', [HomeController::class, 'editProfile'])->name('profile_edit');
Route::post('profile/update/{id}', [HomeController::class, 'updateProfile'])->name('profile_update');

Route::get('carAd', [HomeController::class, 'userCarAd'])->name('userCarAd');
Route::post('carAd', [HomeController::class, 'storeUserCarAd'])->name('storeUserCarAd');
Route::get('/carAd/delete/{id}', [HomeController::class, 'delete'])->name('deleteCarAd');
Route::get('/carAd/edit/{id}', [HomeController::class, 'editCarAd'])->name('editCarAd');
Route::get('/carAd/edit/image/{id}', [HomeController::class, 'editCarAdImage'])->name('editCarAdImage');
Route::post('/carAd/update/{id}', [HomeController::class, 'updateCarAd'])->name('editCarAd');

Route::post('/carAd/loginCheckForListing', [HomeController::class, 'loginCheckForListing'])->name('loginCheckForListing');

Route::get('used-cars/{slug}', [HomeController::class, 'detailsListing'])->name('detailsListing');


Route::group(['prefix'=> 'admin'], function(){

    Route::get('/', [HomeController::class, 'admin'])->name('admin')->middleware('admin-guard');
    // User Routes 
    Route::get('/users', [UserController::class, 'index'])->name('admin.users')->middleware('admin-guard');
    Route::post('/users/register/check', [UserController::class, 'admin_user_register'])->name('admin_user_register');
    Route::post('/users/edit', [UserController::class, 'admin_user_edit'])->name('admin_user_edit');
    Route::post('/users/update/{id}', [UserController::class, 'admin_user_update']);
    Route::get('/users/delete/{id}', [UserController::class, 'admin_user_delete']);
    Route::post('/users/status_check', [UserController::class, 'status_check'])->name('status_check');

     // City Routes 
  Route::get('/city', [CityController::class, 'index'])->name('admin.cities')->middleware('admin-guard');
  Route::post('/city/create', [CityController::class, 'store'])->name('admin.createCity');
  Route::post('/city/edit', [CityController::class, 'edit'])->name('admin.editCity');
  Route::post('city/update/{id}', [CityController::class, 'update'])->name('admin.updateCity');
  Route::get('/city/delete/{id}', [CityController::class, 'delete'])->name('admin.deleteCity');

   //   Brand Routes 
   Route::get('brands', [BrandController::class, 'index'])->name('admin.brands')->middleware('admin-guard');
   Route::post('brands/create', [BrandController::class, 'store'])->name('admin_brand_create');
   Route::post('brands/status_check', [BrandController::class, 'brand_status_check'])->name('brand_status_check');
   Route::post('brands/edit', [BrandController::class, 'admin_brand_edit'])->name('admin_brand_edit');
   Route::post('brands/update/{id}', [BrandController::class, 'admin_brand_update'])->name('admin_brand_update');
   Route::get('brands/delete/{id}', [BrandController::class, 'admin_brand_delete'])->name('admin_brand_delete');

    //Color Routes
   Route::get('colors', [ColorController::class, 'index'])->name('admin.colors')->middleware('admin-guard');
   Route::post('colors/create', [ColorController::class, 'store'])->name('admin_color_create');
   Route::post('colors/edit', [ColorController::class, 'admin_color_edit'])->name('admin_color_edit');
   Route::post('colors/update/{id}', [ColorController::class, 'admin_color_update'])->name('admin_color_update');
   Route::get('colors/delete/{id}', [ColorController::class, 'admin_color_delete'])->name('admin_color_delete');

   //Model Name Routes
   Route::get('models', [ModelController::class, 'index'])->name('admin.models')->middleware('admin-guard');
   Route::post('models/create', [ModelController::class, 'store'])->name('admin_model_create');
   Route::post('models/edit', [ModelController::class, 'admin_model_edit'])->name('admin_model_edit');
   Route::post('models/update/{id}', [ModelController::class, 'admin_model_update'])->name('admin_model_update');
   Route::get('models/delete/{id}', [ModelController::class, 'admin_model_delete'])->name('admin_model_delete');

//Listing Routes
Route::get('/listing', [ListingController::class, 'index'])->name('admin.listing')->middleware('admin-guard');
Route::get('/listing/create', [ListingController::class, 'create'])->name('admin.createlisting');
Route::post('/getModelsName', [ListingController::class, 'getModelsName'])->name('admin.getModelsName');
Route::post('/listing/create', [ListingController::class, 'store'])->name('admin.createlisting');
Route::get('/listing/edit/{id}', [ListingController::class, 'edit'])->name('admin.editlisting');
Route::post('/listing/update/{id}', [ListingController::class, 'update'])->name('admin.updatelisting');
Route::get('/listing/delete/{id}', [ListingController::class, 'delete'])->name('admin.deletelisting');
Route::post('/listing/status_check', [ListingController::class, 'status_check'])->name('car_status_check');

});



Route::get('sessions', function(){
       echo '<pre>';
       print_r(session()->all());
    });
