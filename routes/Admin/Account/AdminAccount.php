<?php

Route::get('AccountSettings','Admin\AccountController@AdminAccountSettings')->name('AdminAccountSettings');


Route::post('UpdateAccount','Admin\AccountController@AdminUpdateAccount')->name('AdminUpdateAccount');


?>
