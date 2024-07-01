<?php

Route::get('Plans&Pricing','Admin\PlansPricing\PlansPricingController@AllPlans')
->name('AdminPlansPricing');

Route::post('ActivatePlan/{id}','Admin\PlansPricing\PlansPricingController@ActivatePlan')
->name('AdminActivatePlan');

Route::post('DeactivatePlan/{id}','Admin\PlansPricing\PlansPricingController@DeactivatePlan')
->name('AdminDeactivatePlan');

Route::get('PlanCountries/{id}','Admin\PlansPricing\PlansPricingController@PlanCountries')
->name('AdminPlanCountries');

Route::get('AddPlanCountries/{plan}/{country}','Admin\PlansPricing\PlansPricingController@AddPlanCountries')
->name('AdminAddPlanCountries');

Route::post('RemovePlanCountries/{plan}/{country}','Admin\PlansPricing\PlansPricingController@RemovePlanCountries')
->name('AdminRemovePlanCountries');

Route::get('CreatePlan','Admin\PlansPricing\PlansPricingController@CreatePlan')
->name('AdminCreatePlan');
Route::post('SavePlan','Admin\PlansPricing\PlansPricingController@SavePlan')
->name('AdminSavePlan');


Route::get('EditFeatures/{feature}','Admin\PlansPricing\PlansPricingController@EditFeatures')
->name('AdminEditFeatures');

Route::post('UpdateFeatures/{feature}','Admin\PlansPricing\PlansPricingController@UpdateFeatures')
->name('AdminUpdateFeatures');


Route::get('EditPlan/{id}','Admin\PlansPricing\PlansPricingController@EditPlan')
->name('AdminEditPlan');
Route::post('UpdatePlan/{id}','Admin\PlansPricing\PlansPricingController@UpdatePlan')
->name('AdminUpdatePlan');

Route::delete('DeletePlan/{id}','Admin\PlansPricing\PlansPricingController@DeletePlan')
->name('AdminDeletePlan');

?>
