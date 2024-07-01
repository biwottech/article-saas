<?php
Route::prefix('Reader')->middleware(['auth','reader'])->group(function(){

	include('ReaderAccount.php');	
	include('ReaderArticles.php');
	include('ReaderDashboard.php');	
});
?>
