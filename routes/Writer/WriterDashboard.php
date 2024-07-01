<?php

Route::get('Dashboard','Writer\WriterDashboardController@Dashboard')
->name('WriterDashboard');

Route::get('Settings','Writer\WriterDashboardController@Settings')
->name('WriterSettings');
?>
