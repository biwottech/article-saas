<?php
Route::prefix('Writer')->middleware(['auth','writer'])->group(function(){

	include('WriterDashboard.php');

	include('WriterAccount.php');

	include('WriterArticles.php');

	include('WriterCompetetions.php');
	
	include('PlansPricing.php');

	include('WriterSubscriptions.php');

	include('WriterPaypal.php');

});
?>
