<?php

Route::get('AgeGroups','Admin\AgeGroups\AgeGroupController@StudentAgeGroups')
->name('AdminStudentAgeGroups');

Route::get('StudentGroups/{id}','Admin\AgeGroups\AgeGroupController@StudentGroups')
->name('AdminStudentGroups');

Route::get('CreateAgeGroup','Admin\AgeGroups\AgeGroupController@CreateAgeGroup')
->name('AdminCreateAgeGroup');

Route::post('SaveAgeGroup','Admin\AgeGroups\AgeGroupController@SaveAgeGroup')
->name('AdminSaveAgeGroup');

Route::get('EditAgeGroup/{id}','Admin\AgeGroups\AgeGroupController@EditAgeGroup')
->name('AdminEditAgeGroup');

Route::post('UpdateAgeGroup/{id}','Admin\AgeGroups\AgeGroupController@UpdateAgeGroup')
->name('AdminUpdateAgeGroup');

Route::delete('DeleteAgeGroup/{id}','Admin\AgeGroups\AgeGroupController@AdminDeleteAgeGroup')
->name('AdminDeleteAgeGroup');

?>
