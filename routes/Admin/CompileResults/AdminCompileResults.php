<?php

/*begin::Compile Results for Specific Competetion*/
Route::get('Competetion/{competetion}/CompileResults','Admin\CompileResults\AdminCompileResultsController@CompileResults')
	->name('AdminCompileResults');

Route::get('Competetion/{competetion}/ViewArticlesInAgeGroup/{group}','Admin\CompileResults\AdminCompileResultsController@ViewArticlesInAgeGroup')
	->name('AdminViewCompetetionArticlesInAgeGroup');

Route::get('Competetion/{competetion}/CompileResultsForAgeGroup/{group}','Admin\CompileResults\AdminCompileResultsController@CompileResultsForAgeGroup')
	->name('AdminCompileResultsForAgeGroup');

Route::get('Competetion/{competetion}/Details','Admin\CompileResults\AdminCompileResultsController@CompetetionDetails')
	->name('AdminCompetetionDetails');

Route::get('Competetion/{competetion}/ResultDate','Admin\CompileResults\AdminCompileResultsController@CompetetionResultDate')
	->name('AdminCompetetionResultDate');

Route::post('SaveCompetetion/{competetion}/ResultDate','Admin\CompileResults\AdminCompileResultsController@SaveCompetetionResultDate')
	->name('AdminSaveCompetetionResultDate');
/*end::Compile Results for Specific Competetion*/

?>
