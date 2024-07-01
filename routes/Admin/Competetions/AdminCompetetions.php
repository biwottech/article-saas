<?php

/*begin::Competetion CRUD*/
Route::get('Competetions','Admin\Competetions\StudentCompetetionController@CompetetionsDashboard')
	->name('AdminCompetetionsDashboard');

Route::get('CreateCompetetion','Admin\Competetions\StudentCompetetionController@CreateCompetetion')
	->name('AdminCreateCompetetion');

Route::post('SaveCompetetionInfo','Admin\Competetions\StudentCompetetionController@SaveCompetetionInfo')
	->name('SaveCompetetionInfo');

Route::get('EditCompetetion/{id}','Admin\Competetions\StudentCompetetionController@EditCompetetion')
	->name('EditCompetetion');

Route::post('UpdateCompetetion/{id}','Admin\Competetions\StudentCompetetionController@UpdateCompetetion')
	->name('AdminUpdateCompetetion');

Route::get('ViewCompetetion/{id}','Admin\Competetions\StudentCompetetionController@ViewCompetetion')
	->name('AdminViewCompetetion');

Route::delete('DeleteCompetetion/{id}','Admin\Competetions\StudentCompetetionController@DeleteCompetetion')
	->name('AdminDeleteCompetetion');
/*end::Competetion CRUD*/

/*begin::Competetion Data*/
Route::get('Competetion/{id}/AgeGroups','Admin\Competetions\StudentCompetetionController@AgeGroups')
	->name('AdminCompetetionAgeGroups');

Route::get('Competetion/{competetion}/ViewParticipantsInAgeGroup/{group}','Admin\Competetions\StudentCompetetionController@ViewParticipantsInAgeGroup')
	->name('AdminViewParticipantsInAgeGroup');
	
Route::get('Competetion/{id}/Participants','Admin\Competetions\StudentCompetetionController@Participants')
	->name('AdminCompetetionParticipants');

Route::get('Competetion/{id}/RatedArticles','Admin\Competetions\StudentCompetetionController@RatedArticles')
	->name('AdminCompetetionRatedArticles');

Route::get('Competetion/{id}/SubmittedArticles','Admin\Competetions\StudentCompetetionController@SubmittedArticles')
	->name('AdminCompetetionSubmittedArticles');

Route::get('Competetion/{id}/ViewedArticles','Admin\Competetions\StudentCompetetionController@ViewedArticles')
	->name('AdminCompetetionViewedArticles');

Route::get('Competetion/{competetion}/ViewParticipant/{participant}/Data','Admin\Competetions\StudentCompetetionController@ViewParticipantData')
	->name('AdminCompetetionViewParticipantData');
/*end::Competetion Data*/

/*begin::Competetion Start , Pause , Resume , End*/
Route::get('Competetion/{competetion}/Start','Admin\Competetions\StudentCompetetionController@StartCompetetion')
	->name('AdminStartCompetetion');

Route::get('Competetion/{competetion}/Pause','Admin\Competetions\StudentCompetetionController@PauseCompetetion')
	->name('AdminPauseCompetetion');

Route::get('Competetion/{competetion}/Resume','Admin\Competetions\StudentCompetetionController@ResumeCompetetion')
	->name('AdminResumeCompetetion');

Route::post('Competetion/{competetion}/End','Admin\Competetions\StudentCompetetionController@EndCompetetion')
	->name('AdminEndCompetetion');
/*begin::Competetion Start , Pause , Resume , End*/
?>
