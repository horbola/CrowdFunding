<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocialController;


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('guest-campaign-list', 'CampaignController@indexGuestCampaign')->name('campaign.indexGuestCampaign');
Route::get('guest-campaign-search', 'CampaignController@indexSearchedCampaign')->name('campaign.indexSearchedCampaign');
Route::post('guest-campaign-filter', 'CampaignController@indexFilteredCampaign')->middleware('auth')->name('campaign.indexFilteredCampaign');
Route::get('guest-campaign/{campaignSlug}', 'CampaignController@showGuestCampaign')->name('campaign.showGuestCampaign');
// this route is for short link purpose
Route::get('c/{campaignId}', 'CampaignController@showGuestCampaign')->name('campaign.shortLink');
Route::get('searchCamp', 'HomeController@searchCamp')->name('campaign.search');

//Route::get('blog/{pageName}', 'BlogController@showGuestCampaign');

// Route::get('donation-create', 'DonationController@createModel')->name('donation.createModel');
// Route::match(['get', 'post'], '/donation-create', [
//    'uses' => 'DonationController@createDialogues',
//    'as'   => 'donation.createDialogues',
//]);
Route::get('donation-create-payment-info-from-address', 'DonationController@createPaymentInfoFromAddress')->name('donation.createPaymentInfoFromAddress');
Route::get('donation-create', 'DonationController@createDialogues')->name('donation.createDialogues');
Route::get('donation-create-payment-info', 'DonationController@createPaymentInfo')->name('donation.createPaymentInfo'); 
Route::get('donation-create-payment-info-from-login', 'DonationController@createPaymentInfoFromLogin')->name('donation.createPaymentInfoFromLogin')->middleware('auth');
Route::post('donation-store', 'DonationController@store')->name('donation.store');

// SSLCOMMERZ Start
Route::get('/example1', [App\Http\Controllers\SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [App\Http\Controllers\SslCommerzPaymentController::class, 'exampleHostedCheckout']);
Route::post('/pay', [App\Http\Controllers\SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [App\Http\Controllers\SslCommerzPaymentController::class, 'payViaAjax']);
Route::post('/success', [App\Http\Controllers\SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [App\Http\Controllers\SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [App\Http\Controllers\SslCommerzPaymentController::class, 'cancel']);
Route::post('/ipn', [App\Http\Controllers\SslCommerzPaymentController::class, 'ipn']);
// SSLCOMMERZ END

Route::get('test', function(){
    return view('test.sticky-form');
});

// --------------------------------------------------------------------------------------------------
// initiated by ajax request
// updates likes for campaign
Route::post('update-like/{campaignId}', 'LikeController@update')->name('like.update');
// updates likes for comment
Route::post('update-like-for-comment/{commentId}', 'LikeForCommentController@store')->name('comment.storeLikeForComment');
// --------------------------------------------------------------------------------------------------
Route::post('store-comment', 'CommentController@store')->name('comment.store');


Auth::routes(['verify' => true]);
Route::get('login/facebook', [SocialController::class, 'facebookRedirect'])->name('login.facebook');
Route::get('login/facebook/callback', [SocialController::class, 'loginWithFacebook']);
Route::get('login/google', [SocialController::class, 'googleRedirect'])->name('login.google');
Route::get('login/google/callback', [SocialController::class, 'loginWithGoogle']);
Route::get('verify/resend', [App\Http\Controllers\Auth\TwoFactorController::class, 'resend'])->name('verify.resend');
Route::get('verify', [App\Http\Controllers\Auth\TwoFactorController::class, 'index'])->name('verify.index');
Route::post('verify/store', [App\Http\Controllers\Auth\TwoFactorController::class, 'store'])->name('verify.store');

Route::group(['prefix' => 'dashboard', 'middleware' => ['auth', 'nullAuth', 'twofactor', 'verified']], function(){
    // profile routes
    // this route serves two purpose. one is for admin user related operation
    // another is for client profile operation. id portion is used for admin.
    Route::get('profile/show', 'UserController@show')->name('user.show');
    Route::get('profile/showMenu', 'UserController@showMenu')->name('user.showMenu'); 
    Route::get('profile/edit/{id?}', 'UserController@edit')->name('user.edit'); //return view('dashboard.profile-edit')->with(compact('user', 'countries'));
    Route::put('profile/update/{id?}', 'UserController@update')->name('user.update'); //return redirect(route('user.show', $user->id))->with('success', $req->profileItem.' has been updated');
    Route::put('profile/photo/{id?}', 'UserController@updatePhoto')->name('user.updatePhoto'); //return redirect(route('user.showProfile', $user->id))->with(['success' => $req->profileItem.' has been updated', 'user' => $user]);
    Route::patch('profile/active-status/delete', 'UserController@updateDeletion')->name('user.updateDeletion');
    // Route::patch('profile/active-status/retrieve', 'UserController@updateActivation')->name('user.updateRetrieval');
    Route::patch('profile/active-status/pause', 'UserController@updatePausing')->name('user.updatePausing');
    Route::match(['get', 'patch'], 'profile/active-status/resume', 'UserController@updateActivation')->name('user.updateResuming');

    Route::get('campaign/donated', 'CampaignController@indexDonatedCampaign')->name('campaign.indexDonatedCampaign'); 
    Route::get('campaign/supported', 'CampaignController@indexSupportedCampaign')->name('campaign.indexSupportedCampaign'); 
    Route::get('campaign/shared', 'CampaignController@indexSharedCampaign')->name('campaign.indexSharedCampaign'); 
    Route::get('campaign/commented', 'CampaignController@indexCommentedCampaign')->name('campaign.indexCommentedCampaign'); 
    // views is counted by when user clicks on a tile to see it's detail.
    Route::get('campaign/viewed', 'CampaignController@indexViewedCampaign')->name('campaign.indexViewedCampaign');
    
    Route::get('preference', 'PreferenceController@index')->name('preference.index');
    Route::get('preference/createPassReset', 'PreferenceController@createPassReset')->name('preference.createPassReset');
    Route::patch('preference/updatePassReset', 'PreferenceController@updatePassReset')->name('preference.updatePassReset');

    
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
        // Route::get('preview-campaign', 'CampaignController@preview')->name('campaign.preview');
        Route::post('campaign', 'CampaignController@store')->name('campaign.store');
        Route::get('campaign/{id}/edit', 'CampaignController@edit')->name('campaign.edit');
        Route::post('store-des-img/{campId}', 'DesImgController@store')->name('desImg.store');
        Route::post('delete-des-img/{imgId}', 'DesImgController@destroy')->name('desImg.delete');
        Route::put('campaign/{id}', 'CampaignController@update')->name('campaign.update');
        Route::post('campaign/{id}/update-des', 'CampaignController@updateDes')->name('campaign.updateDes');
        Route::delete('campaign/{id}/delete', 'CampaignController@destroy')->name('campaign.delete');
        
        Route::delete('album/{id}/delete', 'AlbumController@destroy')->name('album.delete');
        Route::post('document/{id}/delete', 'DocumentController@destroy')->name('document.delete');
        Route::delete('update/{id}/delete', 'UpdateController@destroy')->name('update.delete');
        
        Route::put('campaign/{id}/updates/store', 'UpdateController@store')->name('campaign.updates.store');
        
        // ??middleware doesn't work.
        Route::get('payment-method/create', 'PaymentMethodController@create')->name('paymentMethod.create');
        Route::post('payment-method/store', 'PaymentMethodController@store')->name('paymentMethod.store');
        
        Route::get('campaigner-fund-panel', 'FundController@indexCampaignerFundPanel')->name('fund.indexCampaignerFundPanel');
        Route::get('campaigner-fund-panel/fundableCamp', 'FundController@showFundableCampaigns')->name('fund.showFundableCampaigns');
        Route::get('campaigner-fund-panel/pendedCamp', 'FundController@showFundingPendedCampaigns')->name('fund.showFundingPendedCampaigns');
        Route::get('campaigner-fund-panel/compCamp', 'FundController@showCompletelyFundedCampaigns')->name('fund.showCompletelyFundedCampaigns');
        Route::get('campaigner-fund-panel/partCamp', 'FundController@showPartlyFundedCampaigns')->name('fund.showPartlyFundedCampaigns');
        Route::get('campaigner-fund-panel/notCamp', 'FundController@showNotFundedCampaigns')->name('fund.showNotFundedCampaigns');
        Route::get('campaigner-fund-panel/blockedCamp', 'FundController@showFundingBlockedCampaigns')->name('fund.showFundingBlockedCampaigns');
        
        Route::get('campaigner-fund-panel/withdrawRequest/{id}', 'withdrawRequestController@show')->name('withdrawRequest.show');
        Route::post('campaigner-fund-panel/withdrawRequest/store', 'withdrawRequestController@store')->name('withdrawRequest.store');
    });

    
    Route::group(['prefix' => 'voluntier'], function(){
        Route::get('create-volunteer', 'InvestigationController@createVolunteer')->name('volunteer.create');
        Route::post('store-volunteer', 'InvestigationController@storeVolunteer')->name('volunteer.store');
        Route::get('destroy-volunteer', 'InvestigationController@destroyVolunteer')->name('volunteer.destroy');
        Route::delete('destroy-volunteer-confirm', 'InvestigationController@confirmDestroyVolunteer')->name('volunteer.destroy-confirm');
        Route::get('my-investigations', 'InvestigationController@indexInvestigations')->name('investigation.index');
        Route::get('create-investigation', 'InvestigationController@createInvestigation')->middleware('investigation')->name('investigation.create'); // shows all the campaigns from which one can select to investigate
        Route::get('create-investigation-form', 'InvestigationController@createInvestigationForm')->middleware('investigation')->name('investigation.create-form'); // uploads investigation reports
        Route::post('store-investigation/{campaignId}', 'InvestigationController@storeInvestigation')->middleware('investigation')->name('investigation.store'); // uploads investigation reports
    });
    
    
    Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function(){
        Route::get('users-panel', 'UserController@indexUsersPanel')->name('user.indexUsersPanel'); //return view('admin.users-panel');
        Route::get('users-panel/alls', 'UserController@indexAllUsers')->name('user.indexAllUsers');
        Route::get('users-panel/active', 'UserController@indexActiveUsers')->name('user.indexActiveUsers');
        Route::get('users-panel/blocked', 'UserController@indexBlockedUsers')->name('user.indexBlockedUsers');
        Route::get('users-panel/malicous', 'UserController@indexMalicousUsers')->name('user.indexMalicousUsers');
        Route::patch('users-panel/updateActiveStatus', 'UserController@updateActiveStatus')->name('user.updateActiveStatus');
        Route::get('users-panel/left', 'UserController@indexLeftUsers')->name('user.indexLeftUsers');
        Route::get('users-panel/paused', 'UserController@indexPausedUsers')->name('user.indexPausedUsers');
        
        Route::get('users-panel/guest', 'UserController@indexGuests')->name('user.indexGuests');
        Route::get('users-panel/donor', 'UserController@indexDonors')->name('user.indexDonors');
        Route::get('users-panel/campaigners', 'UserController@indexCampaigners')->name('user.indexCampaigners');
        Route::get('users-panel/volunteer-request', 'UserController@indexVolunteerRequests')->name('user.indexVolunteerRequests');
        Route::get('users-panel/volunteer', 'UserController@indexVolunteers')->name('user.indexVolunteers');
        Route::patch('users-panel/update-volunteer', 'UserController@updateVolunteer')->name('user.updateVolunteer');
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
        Route::get('admin-campaign-panel/index-picked', 'CampaignController@indexAdminPickedCampaign')->name('campaign.indexAdminPickedCampaign');
        Route::patch('admin-campaign-panel/updatePicked/{id}', 'CampaignController@updatePickedCampaign')->name('campaign.updatePickedCampaign');
        Route::patch('admin-campaign-panel/approve/{id}', 'CampaignController@updateStatusToApproved')->name('campaign.updateStatusToApproved');
        Route::patch('admin-campaign-panel/cancel/{id}', 'CampaignController@updateStatusToCancel')->name('campaign.updateStatusToCancel');
        Route::patch('admin-campaign-panel/block/{id}', 'CampaignController@updateStatusToBlock')->name('campaign.updateStatusToBlock');
        Route::patch('approve-inv-report/{invId}', 'InvestigationController@updateApproval')->name('investigation.updateApproval');
        Route::patch('cancel-inv-report/{invId}', 'InvestigationController@updateCancel')->name('investigation.updateCancel');

        Route::get('admin-fund-panel', 'FundController@indexAdminFundPanel')->name('fund.indexAdminFundPanel');
        Route::get('admin-fund-panel/fundableCamp', 'FundController@indexFundableCampaigns')->name('fund.indexFundableCampaigns');
        Route::get('admin-fund-panel/pendingCamp', 'FundController@indexPendingCampaigns')->name('fund.indexPendingCampaigns');
        Route::get('admin-fund-panel/compFundedCamp', 'FundController@indexCompFundedCampaigns')->name('fund.indexCompFundedCampaigns');
        Route::get('admin-fund-panel/partlyFundedCamp', 'FundController@indexPartlyFundedCampaigns')->name('fund.indexPartlyFundedCampaigns');
        Route::get('admin-fund-panel/notFundedCamp', 'FundController@indexNotFundedCampaigns')->name('fund.indexNotFundedCampaigns');
        Route::get('admin-fund-panel/fundingBlockedCamp', 'FundController@indexFundingBlockedCamps')->name('fund.indexFundingBlockedCamps');
        
        Route::get('admin-fund-panel/withdrawRequestPend/{id}', 'withdrawRequestController@showPendingToAdmin')->name('withdrawRequest.showPendingToAdmin');
        Route::get('admin-fund-panel/withdrawRequestComp/{id}', 'withdrawRequestController@showCompletedToAdmin')->name('withdrawRequest.showCompletedToAdmin');
        Route::get('admin-fund-panel/withdrawRequestCan/{id}', 'withdrawRequestController@showCancelledToAdmin')->name('withdrawRequest.showCancelledToAdmin');
        Route::post('admin-fund-panel/withdrawPayment/{id}', 'withdrawPaymentController@store')->name('withdrawPayment.store');
        
        Route::get('platform-panel', 'PlatformController@indexPlatformPanel')->name('platform.indexPlatformPanel');
        Route::get('platform-panel/settings', 'PlatformController@indexPlatformSettings')->name('platform.indexPlatformSettings');
        Route::get('platform-panel/category', 'CategoryController@index')->name('category.index');
        Route::post('platform-panel/category', 'CategoryController@store')->name('category.store');
        Route::put('platform-panel/category/{id}', 'CategoryController@update')->name('category.update');
        Route::delete('platform-panel/category/{id}', 'CategoryController@destroy')->name('category.destroy');
        Route::get('platform-panel/comments', 'CommentController@index')->name('comment.index');
        Route::patch('platform-panel/enableComment/{id}', 'CommentController@update')->name('comment.enable');
        Route::delete('platform-panel/deleteComment/{id}', 'CommentController@destroy')->name('comment.delete');
        
        Route::group(['prefix' => 'super', 'middleware'=>'super'], function(){
            Route::get('permission', 'PermissionController@storePermission')->name('permission.store');
        });
    });
});



// accessories
Route::get('acces/team', function(){
    $title = 'Team - Oporajoy Crowd Fudning';
    return view('accessories/team', compact('title'));
})->name('a.team');

Route::get('acces/partners', function(){
    $title = 'Partners - Oporajoy Crowd Fudning';
    return view('accessories/partners', compact('title'));
})->name('a.partners');

Route::get('acces/careers', function(){
    $title = 'Careers - Oporajoy Crowd Fudning';
    return view('accessories/careers', compact('title'));
})->name('a.careers');

Route::get('acces/volunteer', function(){
    $title = 'Volunteer - Oporajoy Crowd Fudning';
    return view('accessories/volunteer', compact('title'));
})->name('a.volunteer');

Route::get('acces/privacy-policy', function(){
    $title = 'Privacy Policy - Oporajoy Crowd Fudning';
    return view('accessories/privacy-policy', compact('title'));
})->name('a.privacy-policy');

Route::get('acces/fund', function(){
    $title = 'Fund - Oporajoy Crowd Fudning';
    return view('accessories/fund', compact('title'));
})->name('a.fund');

Route::get('acces/terms-of-use', function(){
    $title = 'Terms Of Use - Oporajoy Crowd Fudning';
    return view('accessories/terms-of-use', compact('title'));
})->name('a.terms-of-use');

Route::get('acces/trust-n-safety', function(){
    $title = 'Trust And Safety - Oporajoy Crowd Fudning';
    return view('accessories/trust-n-safety', compact('title'));
})->name('a.trust-n-safety');

Route::get('acces/service-greement', function(){
    $title = 'Service Agreement - Oporajoy Crowd Fudning';
    return view('accessories/service-agreement', compact('title'));
})->name('a.service-agreement');

Route::get('acces/fund-for-a-person', function(){
    $title = 'Fund For A Person - Oporajoy Crowd Fudning';
    return view('accessories/fund-for-a-person', compact('title'));
})->name('a.fund-for-a-person');

Route::get('acces/music-projects', function(){
    $title = 'Music Projects - Oporajoy Crowd Fudning';
    return view('accessories/music-projects', compact('title'));
})->name('a.music-projects');

Route::get('acces/fund-raising-deas', function(){
    $title = 'Fund Raising Ideas - Oporajoy Crowd Fudning';
    return view('accessories/fund-raising-ideas', compact('title'));
})->name('a.fund-raising-ideas');

Route::get('acces/gift-cards', function(){
    $title = 'Gift Cards - Oporajoy Crowd Fudning';
    return view('accessories/gift-cards', compact('title'));
})->name('a.gift-cards');

Route::get('acces/personal-causes', function(){
    $title = 'Personal Causes - Oporajoy Crowd Fudning';
    return view('accessories/personal-causes', compact('title'));
})->name('a.personal-causes');

Route::get('acces/funding-for-education', function(){
    $title = 'Funding For Education - Oporajoy Crowd Fudning';
    return view('accessories/funding-for-education', compact('title'));
})->name('a.funding-for-education');

Route::get('acces/contact', function(){
    $title = 'Contact - Oporajoy Crowd Fudning';
    return view('accessories/contact', compact('title'));
})->name('a.contact');

Route::get('acces/faq', function(){
    $title = 'FAQ - Oporajoy Crowd Fudning';
    return view('accessories/faq', compact('title'));
})->name('a.faq');

Route::get('acces/payment-system', function(){
    $title = 'Payment System - Oporajoy Crowd Fudning';
    return view('accessories/payment-system', compact('title'));
})->name('a.payment-system');

Route::get('acces/fund-raising-tips', function(){
    $title = 'Fund Raising Tips - Oporajoy Crowd Fudning';
    return view('accessories/fund-raising-tips', compact('title'));
})->name('a.fund-raising-tips');

Route::get('acces/fund-raising-video', function(){
    $title = 'Fund Raising Video - Oporajoy Crowd Fudning';
    return view('accessories/fund-raising-video', compact('title'));
})->name('a.fund-raising-video');

Route::get('acces/project-handbook', function(){
    $title = 'Project Handbook - Oporajoy Crowd Fudning';
    return view('accessories/project-handbook', compact('title'));
})->name('a.project-handbook');




// errors
Route::get('errors/404', function(){
    $title = 'Project Handbook - Oporajoy Crowd Fudning';
    return view('accessories/project-handbook', compact('title'));
})->name('e.404');



