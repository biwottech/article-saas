<?php

Route::get('Account','Reader\ReaderAccountController@Account')->name('ReaderAccount');

Route::post('UploadAvatar/{id}','Reader\ReaderAccountController@UploadAvatar')->name('ReaderUploadAvatar');

Route::get('RemoveAvatar/{id}','Reader\ReaderAccountController@RemoveAvatar')->name('ReaderRemoveAvatar');

Route::post('UpdateAccount/{id}','Reader\ReaderAccountController@UpdateAccount')->name('ReaderUpdateAccount');
?>
