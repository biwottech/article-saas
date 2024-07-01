<?php

Route::get('BasicInformation','Writer\WriterAccountController@BasicInformation')
->name('WriterBasicInformation');
Route::post('SaveBasicInformation','Writer\WriterAccountController@SaveBasicInformation')
->name('WriterSaveBasicInformation');

Route::get('ProfilePicture','Writer\WriterAccountController@ProfilePicture')
->name('WriterProfilePicture');
Route::post('SaveProfilePicture','Writer\WriterAccountController@SaveProfilePicture')
->name('WriterSaveProfilePicture');

Route::post('RemoveProfilePicture','Writer\WriterAccountController@RemoveProfilePicture')
->name('WriterRemoveProfilePicture');

Route::get('SchoolInformation','Writer\WriterAccountController@SchoolInformation')
->name('WriterSchoolInformation');
Route::post('SaveSchoolInformation','Writer\WriterAccountController@SaveSchoolInformation')
->name('WriterSaveSchoolInformation');


Route::get('TeacherInformation','Writer\WriterAccountController@TeacherInformation')
->name('WriterTeacherInformation');
Route::post('SaveTeacherInformation','Writer\WriterAccountController@SaveTeacherInformation')
->name('WriterSaveTeacherInformation');


Route::get('InstituteInformation','Writer\WriterAccountController@InstituteInformation')
->name('WriterInstituteInformation');
Route::post('SaveInstituteInformation','Writer\WriterAccountController@SaveInstituteInformation')
->name('WriterSaveInstituteInformation');

Route::get('Security','Writer\WriterAccountController@Security')
->name('WriterSecurity');
Route::post('SavePassword','Writer\WriterAccountController@SavePassword')
->name('WriterSavePassword');

Route::get('MyPaypalAccounts','Writer\WriterAccountController@MyPaypalAccounts')
->name('MyPaypalAccounts');

Route::post('AddPaypalAccount','Writer\WriterAccountController@AddPaypalAccount')->name('AddPaypalAccount');

Route::post('UpdatePaypalAccount/{id}','Writer\WriterAccountController@UpdatePaypalAccount')
->name('UpdatePaypalAccount');

Route::delete('DeletePaypalAccount/{id}','Writer\WriterAccountController@DeletePaypalAccount')
->name('DeletePaypalAccount');

?>
