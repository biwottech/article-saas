<?php

Route::get('PaypalSettings','Admin\Paypal\PaypalController@PaypalSettings')
->name('AdminPaypalSettings');

Route::post('SavePaypalSettings','Admin\Paypal\PaypalController@SavePaypalSettings')
->name('AdminSavePaypalSettings');


?>
