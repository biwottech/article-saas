<?php

/*begin::Join Routes*/
Route::get('Join','Auth\RegisterController@Join')
->name('JoinUs');
Route::get('JoinAsStudent', 'Auth\RegisterController@JoinAsStudent')
->name('JoinAsStudent');
Route::post('JoinAsStudent', 'Auth\RegisterController@SaveAsStudent')
->name('SaveAsStudent');
Route::get('JoinAsViewOnly', 'Auth\RegisterController@JoinAsViewOnly')
->name('JoinAsViewOnly');
Route::post('JoinAsViewOnly', 'Auth\RegisterController@SaveAsViewOnly')
->name('SaveAsViewOnly');
/*begin::Join Routes*/

/*begin::Authentication Routes*/
Route::get('login', 'Auth\LoginController@showLoginForm')
->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')
->name('logout');
Route::get('register',function(){
	return redirect()->route('JoinUs');
})->name('register');
/*begin::Authentication Routes*/
?>
