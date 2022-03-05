<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CampaignController;

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





Auth::routes(['verify' => true]);
//->middleware('auth', 'verified')




// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// guest routes
Route::get('/', function () {
    return view('home');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// ------------------------------------------------------------------------------------------
// campaigns routes
Route::get('indexGuestCampaign/{category?}', 'App\Http\Controllers\CampaignController@indexGuestCampaign')->name('campaign.indexGuestCampaign');
Route::get('showGuestCampaign/{campaignID}', 'App\Http\Controllers\CampaignController@showGuestCampaign')->name('campaign.showGuestCampaign');
// campaigns routes
// ------------------------------------------------------------------------------------------
// guest ends
// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++










// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// client routes
Route::get('/showClientDashboard', 'App\Http\Controllers\DashboardController@indexClientDashB')->name('dashboard.showClientDashboard');

// ------------------------------------------------------------------------------------------
// initiated by ajax call from from dashboard menu and sent as partial to dashboard
// profile route
Route::get('/showUser/{userID}', 'App\Http\Controllers\UserController@show')->name('user.showProfile');
// campaign routes
Route::get('indexClientCampaign/{type?}', 'App\Http\Controllers\CampaignController@indexClientCampaign')->name('campaign.indexClientCampaign');
// wallet routes
Route::get('/showCampaignerWallet/{userID}', 'App\Http\Controllers\WalletController@showCampaignerWallet')->name('wallet.showCampaignerWallet');
// settings routes
Route::get('/showClientSettings/{userID}', 'App\Http\Controllers\SettingsController@showClientSettings')->name('settings.showClientSettings');
// ajax ends
// ------------------------------------------------------------------------------------------
// clients ends
// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++










// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// admin's routes
Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'App\Http\Controllers\DashboardController@indexAdminDashB')->name('dashboard.indexAdminDashB');
    // initiated by ajax call from from dashboard menu and sent as partial to dashboard
    Route::get('indexAdminDashB', 'App\Http\Controllers\DashboardController@indexAdminDashB')->name('dashboard.indexAdminDashB');
    Route::get('indexDashBSummary', 'App\Http\Controllers\DashboardController@indexDashBSummary')->name('dashboard.indexDashBSummary');
    Route::get('indexUsers', 'App\Http\Controllers\UserController@indexUsers')->name('user.indexUsers');
    Route::get('indexAdminCampaignSummary/{category?}', 'App\Http\Controllers\CampaignController@indexAdminCampaignSummary')->name('campaign.indexAdminCampaignSummary');
    Route::get('indexAdminCampaign/{category?}', 'App\Http\Controllers\CampaignController@indexAdminCampaign')->name('campaign.indexAdminCampaign');
    // ajax ends
});
// admin routes ends
// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++









/*
Route::get('search', ['as' => 'search', 'uses' => 'CategoriesController@search']);
Route::get('categories', ['as' => 'browse_categories', 'uses' => 'CategoriesController@browseCategories']);
Route::get('categories/{id}/{slug?}', ['as' => 'single_category', 'uses' => 'CategoriesController@singleCategory']);
*/





