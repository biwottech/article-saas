<?php
Route::get('Subscriptions','Writer\WriterPlansPricingController@Subscriptions')
->name('WriterSubscriptions');

Route::get('Choose/{plan}/Plan','Writer\WriterPlansPricingController@ChoosePlan')
->name('WriterChoosePlan');

Route::post('Pay/{plan}/Now','Writer\WriterPlansPricingController@PayNow')
->name('WriterPayNow');

Route::get('OrderSuccessful/{plan}','Writer\WriterPlansPricingController@OrderSuccessful')
->name('WriterOrderSuccessful');

Route::get('OrderCancel','Writer\WriterPlansPricingController@OrderCancel')
->name('WriterOrderCancel');

Route::post('Cancel/{plan}/Plan','Writer\WriterPlansPricingController@CancelPlan')
->name('WriterCancelPlan');

Route::post('Resume/{plan}/Plan','Writer\WriterPlansPricingController@ResumePlan')
->name('WriterResumePlan');

Route::post('Free/{plan}/Plan','Writer\WriterPlansPricingController@FreePlan')
->name('WriterFreePlan');
?>
