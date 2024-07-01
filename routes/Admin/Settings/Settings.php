<?php

Route::get('Settings','Admin\Settings\SettingsController@AdminSettings')
->name('AdminSettings');

Route::get('BasicInformation','Admin\Settings\SettingsController@AdminBasicInformation')
->name('AdminBasicInformation');

Route::post('SaveBasicInformation','Admin\Settings\SettingsController@AdminSaveBasicInformation')
->name('AdminSaveBasicInformation');

Route::get('ProfilePicture','Admin\Settings\SettingsController@AdminProfilePicture')
->name('AdminProfilePicture');

Route::post('SaveProfilePicture','Admin\Settings\SettingsController@AdminSaveProfilePicture')
->name('AdminSaveProfilePicture');

Route::post('RemoveProfilePicture','Admin\Settings\SettingsController@AdminRemoveProfilePicture')
->name('AdminRemoveProfilePicture');

Route::get('BasicInformation','Admin\Settings\SettingsController@AdminBasicInformation')
->name('AdminBasicInformation');

/*begin::Website Information*/
Route::get('WebsiteInformation','Admin\Settings\SettingsController@WebsiteInformation')
->name('AdminWebsiteInformation');
Route::post('SaveWebsiteInformation','Admin\Settings\SettingsController@SaveWebsiteInformation')
->name('AdminSaveWebsiteInformation');
/*end::Website Information*/


Route::get('Security','Admin\Settings\SettingsController@AdminSecurity')
->name('AdminSecurity');
Route::post('SavePassword','Admin\Settings\SettingsController@AdminSavePassword')
->name('AdminSavePassword');
?>
