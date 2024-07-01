<?php

Route::get('Teachers','Admin\Teachers\TeacherController@Teachers')
->name('AdminTeachers');

Route::get('ViewTeacher/{id}','Admin\Teachers\TeacherController@ViewTeacher')
->name('AdminViewTeacher');

/*begin::View,Update & Remove ProfilePicture*/
Route::get('ViewTeacherProfilePicture/{id}','Admin\Teachers\TeacherController@ViewTeacherProfilePicture')
->name('AdminViewTeacherProfilePicture');

Route::post('UpdateTeacherProfilePicture/{id}','Admin\Teachers\TeacherController@UpdateTeacherProfilePicture')
->name('AdminUpdateTeacherProfilePicture');

Route::post('RemoveTeacherProfilePicture/{id}','Admin\Teachers\TeacherController@RemoveTeacherProfilePicture')
->name('AdminRemoveTeacherProfilePicture');

/*end::View,Update & Remove ProfilePicture*/

/*begin::View & Update BasicInformation*/
Route::get('ViewTeacherBasicInformation/{id}','Admin\Teachers\TeacherController@ViewTeacherBasicInformation')
->name('AdminViewTeacherBasicInformation');

Route::post('UpdateTeacherBasicInformation/{id}','Admin\Teachers\TeacherController@UpdateTeacherBasicInformation')
->name('AdminUpdateTeacherBasicInformation');
/*end::View & Update BasicInformation*/

/*begin::Edit & Update Password*/
Route::get('EditTeacherPassword/{id}','Admin\Teachers\TeacherController@EditTeacherPassword')
->name('AdminEditTeacherPassword');
Route::post('UpdateTeacherPassword/{id}','Admin\Teachers\TeacherController@UpdateTeacherPassword')
->name('AdminUpdateTeacherPassword');
/*end::Edit & Update Password*/

/*begin::Block , Restore , Delete Teacher*/
Route::delete('BlockTeacher/{id}','Admin\Teachers\TeacherController@BlockTeacher')
->name('AdminBlockTeacher');

Route::post('RestoreTeacher/{id}','Admin\Teachers\TeacherController@RestoreTeacher')
->name('AdminRestoreTeacher');

Route::delete('DeleteTeacher/{id}','Admin\Teachers\TeacherController@DeleteTeacher')
->name('AdminDeleteTeacher');
/*end::Block , Restore , Delete Teacher*/
?>
