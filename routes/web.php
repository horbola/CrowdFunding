<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CampaignController;




Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('guest-campaign-list/{categoryId?}', 'CampaignController@indexGuestCampaign')->name('campaign.indexGuestCampaign');
Route::get('guest-campaign/{campaignId}', 'CampaignController@showGuestCampaign')->name('campaign.showGuestCampaign');

Route::get('donation-create', 'DonationController@createModel')->name('donation.createModel'); //return ['success' => 1, 'msg' => trans('app.settings_saved_msg')];
Route::post('donation/{campaignId}', 'DonationController@store')->name('donation.store');
Route::get('test', function(){
    return view('test.sticky-form');
});

// --------------------------------------------------------------------------------------------------
// initiated by ajax request
Route::post('update-like/{campaignId}', 'LikeController@update')->name('like.update');
// --------------------------------------------------------------------------------------------------
Route::post('store-comment', 'CommentController@store')->name('comment.store');


Auth::routes(['verify' => true]);
Route::group(['prefix' => 'dashboard'], function(){
    // profile routes
    Route::get('profile/show', 'UserController@show')->name('user.show'); //return view('dashboard.profile')->with(['user' => $user]);
    Route::get('profile/edit', 'UserController@edit')->name('user.edit'); //return view('dashboard.profile-edit')->with(compact('user', 'countries'));
    Route::put('profile/update', 'UserController@update')->name('user.update'); //return redirect(route('user.show', $user->id))->with('success', $req->profileItem.' has been updated');
    Route::put('profile/photo', 'UserController@updatePhoto')->name('user.updatePhoto'); //return redirect(route('user.showProfile', $user->id))->with(['success' => $req->profileItem.' has been updated', 'user' => $user]);

    Route::get('campaign/donated', 'CampaignController@indexDonatedCampaign')->name('campaign.indexDonatedCampaign'); 
    Route::get('campaign/supported', 'CampaignController@indexSupportedCampaign')->name('campaign.indexSupportedCampaign'); 
    Route::get('campaign/shared', 'CampaignController@indexSharedCampaign')->name('campaign.indexSharedCampaign'); 
    Route::get('campaign/commented', 'CampaignController@indexCommentedCampaign')->name('campaign.indexCommentedCampaign'); 
    // views is counted by when user clicks on a tile to see it's detail.
    Route::get('campaign/viewed', 'CampaignController@indexViewedCampaign')->name('campaign.indexViewedCampaign');
    
    Route::get('preference', 'PreferenceController@index')->name('preference.index');

    
    Route::group(['prefix' => 'campaigner'], function(){
        Route::get('my-campaigns-panel', 'CampaignController@indexMyCampaignsPanel')->name('campaign.indexMyCampaignsPanel');
        Route::get('my-campaigns-panel/alls', 'CampaignController@indexMyAllCampaign')->name('campaign.indexMyAllCampaign');
        Route::get('my-campaigns-panel/active', 'CampaignController@indexMyActiveCampaign')->name('campaign.indexMyActiveCampaign');
        Route::get('my-campaigns-panel/completed', 'CampaignController@indexMyCompletedCampaign')->name('campaign.indexMyCompletedCampaign');
        Route::get('my-campaigns-panel/pending', 'CampaignController@indexMyPendingCampaign')->name('campaign.indexMyPendingCampaign');
        Route::get('my-campaigns-panel/cancelled', 'CampaignController@indexMyCancelledCampaign')->name('campaign.indexMyCancelledCampaign');
        Route::get('my-campaigns-panel/blocked', 'CampaignController@indexMyBlockedCampaign')->name('campaign.indexMyBlockedCampaign');
        Route::get('my-campaigns-panel/declined', 'CampaignController@indexMyDeclinedCampaign')->name('campaign.indexMyDeclinedCampaign');
        Route::patch('my-campaigns-panel/decline/{id}', 'CampaignController@updateStatusToDeclined')->name('campaign.updateStatusToDeclined');
        
        Route::get('create-campaign', 'CampaignController@create')->name('campaign.create');
        Route::post('campaign', 'CampaignController@store')->name('campaign.store');
        Route::get('campaign/{id}/edit', 'CampaignController@edit')->name('campaign.edit');
        Route::put('campaign/{id}', 'CampaignController@update')->name('campaign.update');
        
        Route::get('wallet', 'WalletController@showCampaignerWallet')->name('wallet.showCampaignerWallet');
    });

    
    Route::group(['prefix' => 'voluntier'], function(){
        Route::get('create-volunteer', 'InvestigationController@createVolunteer')->name('volunteer.create');
        Route::post('store-volunteer', 'InvestigationController@storeVolunteer')->name('volunteer.store');
        Route::get('destroy-volunteer', 'InvestigationController@destroyVolunteer')->name('volunteer.destroy');
        Route::delete('destroy-volunteer-confirm', 'InvestigationController@confirmDestroyVolunteer')->name('volunteer.destroy-confirm');
        Route::get('my-investigations', 'InvestigationController@indexInvestigations')->name('investigation.index');
        Route::get('create-investigation', 'InvestigationController@createInvestigation')->name('investigation.create'); // shows all the campaigns from which one can select to investigate
        Route::get('create-investigation-form', 'InvestigationController@createInvestigationForm')->name('investigation.create-form'); // uploads investigation reports
        Route::post('store-investigation/{campaignId}', 'InvestigationController@storeInvestigation')->name('investigation.store'); // uploads investigation reports
    });
    
    
    Route::group(['prefix' => 'admin'], function(){
        Route::get('users-panel', 'UserController@indexUsersPanel')->name('user.indexUsersPanel'); //return view('admin.users-panel');
        Route::get('users-panel/alls', 'UserController@indexAllUsers')->name('user.indexAllUsers');
        Route::get('users-panel/active', 'UserController@indexActiveUsers')->name('user.indexActiveUsers');
        Route::get('users-panel/blocked', 'UserController@indexBlockedUsers')->name('user.indexBlockedUsers');
        Route::get('users-panel/malicous', 'UserController@indexMalicousUsers')->name('user.indexMalicousUsers');
        Route::get('users-panel/left', 'UserController@indexLeftUsers')->name('user.indexLeftUsers');
        Route::get('users-panel/guest', 'UserController@indexGuests')->name('user.indexGuests');
        Route::get('users-panel/donor', 'UserController@indexDonors')->name('user.indexDonors');
        Route::get('users-panel/campaigners', 'UserController@indexCampaigners')->name('user.indexCampaigners');
        Route::get('users-panel/volunteer-request', 'UserController@indexVolunteerRequests')->name('user.indexVolunteerRequests');
        Route::get('users-panel/volunteer', 'UserController@indexVolunteers')->name('user.indexVolunteers');
        Route::get('users-panel/staff', 'UserController@indexStaffs')->name('user.indexStaffs');
        Route::get('users-panel/super', 'UserController@indexSuper')->name('user.indexSuper');
        Route::get('users-panel/top-donor', 'UserController@indexTopDonors')->name('user.indexTopDonors');
        Route::get('users-panel/top-active', 'UserController@indexTopActives')->name('user.indexTopActives');
        Route::get('users-panel/top-supporter', 'UserController@indexTopSupporters')->name('user.indexTopSupporters');
        Route::get('users-panel/top-visiter', 'UserController@indexTopVisiters')->name('user.indexTopVisiters');
        
        Route::get('admin-campaign-panel', 'CampaignController@indexAdminCampaignPanel')->name('campaign.indexAdminCampaignPanel'); //return view('admin.campaigns-panel');
        Route::get('admin-campaign-panel/alls', 'CampaignController@indexAdminAllCampaign')->name('campaign.indexAdminAllCampaign');
        Route::get('admin-campaign-panel/active', 'CampaignController@indexAdminActiveCampaign')->name('campaign.indexAdminActiveCampaign');
        Route::get('admin-campaign-panel/completed', 'CampaignController@indexAdminCompletedCampaign')->name('campaign.indexAdminCompletedCampaign');
        Route::get('admin-campaign-panel/pending', 'CampaignController@indexAdminPendingCampaign')->name('campaign.indexAdminPendingCampaign');
        Route::get('admin-campaign-panel/cancelled', 'CampaignController@indexAdminCancelledCampaign')->name('campaign.indexAdminCancelledCampaign');
        Route::get('admin-campaign-panel/blocked', 'CampaignController@indexAdminBlockedCampaign')->name('campaign.indexAdminBlockedCampaign');
        Route::get('admin-campaign-panel/declined', 'CampaignController@indexAdminDeclinedCampaign')->name('campaign.indexAdminDeclinedCampaign');
        Route::patch('admin-campaign-panel/approve/{id}', 'CampaignController@updateStatusToApproved')->name('campaign.updateStatusToApproved');
        Route::patch('admin-campaign-panel/cancel/{id}', 'CampaignController@updateStatusToCancel')->name('campaign.updateStatusToCancel');
        Route::patch('admin-campaign-panel/block/{id}', 'CampaignController@updateStatusToBlock')->name('campaign.updateStatusToBlock');

        Route::get('fund-panel', 'FundController@indexFundPanel')->name('fund.indexFundPanel'); //return view('admin.platform');
        
        Route::get('platform-panel', 'PlatformController@indexPlatformPanel')->name('platform.indexPlatformPanel'); //return view('admin.platform');
        Route::get('platform-panel/settings', 'SettingsController@index')->name('settings.index'); //return view('admin.settings')->with('page', 'admin settings');
        Route::get('platform-panel/category', 'CategoryController@index')->name('category.index');
        Route::post('platform-panel/category', 'CategoryController@store')->name('category.store');
        Route::put('platform-panel/category/{id}', 'CategoryController@update')->name('category.update');
        Route::delete('platform-panel/category/{id}', 'CategoryController@destroy')->name('category.destroy');
        
        Route::group(['prefix' => 'super'], function(){
            Route::get('permission', 'PermissionController@storePermission')->name('permission.store');
        });
    });
});