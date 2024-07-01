<?php

Route::get('Payments','Admin\Payments\AdminPaymentsController@Payments')
->name('AdminPayments');

Route::get('PayIn','Admin\Payments\AdminPaymentsController@PayIn')
->name('AdminPayIn');

Route::get('PayOut','Admin\Payments\AdminPaymentsController@PayOut')
->name('AdminPayOut');

Route::delete('DeleteSubscription/{subscription}','Admin\Payments\AdminPaymentsController@DeleteSubscription')
->name('AdminDeleteSubscription');

?>
