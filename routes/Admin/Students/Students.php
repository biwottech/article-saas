<?php

/*begin::View All Students*/
Route::get('Students','Admin\Students\StudentController@Students')
->name('AdminStudents');
/*end::View All Students*/

/*begin::View a Specific Student*/
Route::get('ViewStudent/{id}','Admin\Students\StudentController@ViewStudent')
->name('AdminViewStudent');
/*end::View a Specific Student*/

/*begin::View,Update & Remove ProfilePicture*/
Route::get('ViewStudentProfilePicture/{id}','Admin\Students\StudentController@ViewStudentProfilePicture')
->name('AdminViewStudentProfilePicture');

Route::post('UpdateStudentProfilePicture/{id}','Admin\Students\StudentController@UpdateStudentProfilePicture')
->name('AdminUpdateStudentProfilePicture');

Route::post('RemoveStudentProfilePicture/{id}','Admin\Students\StudentController@RemoveStudentProfilePicture')
->name('AdminRemoveStudentProfilePicture');

/*begin::View,Update & Remove ProfilePicture*/

/*begin::View & Update BasicInformation*/
Route::get('ViewStudentBasicInformation/{id}','Admin\Students\StudentController@ViewStudentBasicInformation')
->name('AdminViewStudentBasicInformation');

Route::post('UpdateStudentBasicInformation/{id}','Admin\Students\StudentController@UpdateStudentBasicInformation')
->name('AdminUpdateStudentBasicInformation');
/*begin::View & Update BasicInformation*/

/*begin::View Competetions*/
Route::get('ViewStudentCompetetions/{id}','Admin\Students\StudentController@ViewStudentCompetetions')
->name('AdminViewStudentCompetetions');
/*begin::View Competetions*/

/*begin::View & Update Subscriptions*/
Route::get('ViewStudentSubscriptions/{id}','Admin\Students\StudentController@ViewStudentSubscriptions')
->name('AdminViewStudentSubscriptions');

Route::post('UpdateStudentSubscription/{subscription}','Admin\Students\StudentController@UpdateStudentSubscription')
->name('AdminUpdateStudentSubscription');

Route::post('DeleteStudentSubscription/{subscription}','Admin\Students\StudentController@DeleteStudentSubscription')
->name('AdminDeleteStudentSubscription');

Route::post('CancelStudentSubscription/{subscription}','Admin\Students\StudentController@CancelStudentSubscription')
->name('AdminCancelStudentSubscription');

Route::post('ResumeStudentSubscription/{subscription}','Admin\Students\StudentController@ResumeStudentSubscription')
->name('AdminResumeStudentSubscription');
/*begin::View & Update Subscriptions*/

/*begin::View & Update Paid Amount*/
Route::get('ViewStudentPaidAmount/{id}','Admin\Students\StudentController@ViewStudentPaidAmount')
->name('AdminViewStudentPaidAmount');
Route::post('UpdateStudentPaidAmount/{id}','Admin\Students\StudentController@UpdateStudentPaidAmount')
->name('AdminUpdateStudentWonAmount');
/*begin::View & Update Paid Amount*/

/*begin::View & Update Won Amount*/
Route::get('ViewStudentWonAmount/{id}','Admin\Students\StudentController@ViewStudentWonAmount')
->name('AdminViewStudentWonAmount');
Route::post('UpdateStudentWonAmount/{id}','Admin\Students\StudentController@UpdateStudentWonAmount')
->name('AdminUpdateStudentWonAmount');
/*begin::View & Update Won Amount*/

/*begin::View & Update Articles*/
Route::get('ViewStudentArticles/{id}','Admin\Students\StudentController@ViewStudentArticles')
->name('AdminViewStudentArticles');

Route::post('UpdateStudentArticles/{id}','Admin\Students\StudentController@UpdateStudentArticles')
->name('AdminUpdateStudentArticles');
/*begin::View & Update Articles*/

/*begin::View , Add ,Update & Delete PaypalAccounts*/
Route::get('ViewStudentPaypalAccounts/{id}','Admin\Students\StudentController@ViewStudentPaypalAccounts')
->name('AdminViewStudentPaypalAccounts');

Route::post('AddStudentPaypalAccount/{id}','Admin\Students\StudentController@AddStudentPaypalAccount')
->name('AdminAddStudentPaypalAccount');

Route::post('UpdateStudentPaypalAccount/{id}','Admin\Students\StudentController@UpdateStudentPaypalAccount')
->name('AdminUpdateStudentPaypalAccount');

Route::delete('DeleteStudentPaypalAccount/{id}','Admin\Students\StudentController@DeleteStudentPaypalAccount')
->name('AdminDeleteStudentPaypalAccount');
/*begin::View , Add ,Update & Delete PaypalAccounts*/


/*begin::Edit & Update Password*/
Route::get('EditStudentPassword/{id}','Admin\Students\StudentController@EditStudentPassword')
->name('AdminEditStudentPassword');
Route::post('UpdateStudentPassword/{id}','Admin\Students\StudentController@UpdateStudentPassword')
->name('AdminUpdateStudentPassword');
/*begin::Edit & Update Password*/

/*begin::Block,Restore and Delete Student*/
Route::delete('BlockStudent/{id}','Admin\Students\StudentController@BlockStudent')
->name('AdminBlockStudent');
Route::post('RestoreStudent/{id}','Admin\Students\StudentController@RestoreStudent')
->name('AdminRestoreStudent');
Route::delete('DeleteStudent/{id}','Admin\Students\StudentController@DeleteStudent')
->name('AdminDeleteStudent');
/*end::Block,Restore and Delete Student*/
?>
