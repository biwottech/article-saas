<?php

Route::get('PaypalAccounts','Writer\WriterAccountController@PaypalAccounts')
->name('PaypalAccounts');

Route::post('AddPaypalAccount','Writer\WriterAccountController@AddPaypalAccount')->name('AddPaypalAccount');

Route::post('UpdatePaypalAccount/{id}','Writer\WriterAccountController@UpdatePaypalAccount')
->name('UpdatePaypalAccount');

Route::delete('DeletePaypalAccount/{id}','Writer\WriterAccountController@DeletePaypalAccount')
->name('DeletePaypalAccount');

?>
