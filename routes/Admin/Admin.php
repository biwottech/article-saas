<?php
Route::prefix('Admin')->middleware(['auth','admin'])->group(function(){

	/*begin::Dashboard*/
	include('Dashboard/AdminDashboard.php');
	/*end::Dashboard*/

	/*begin::Teachers*/
	include('Teachers/Teachers.php');
	/*begin::Teachers*/

	/*begin::Students*/
	include('Students/Students.php');
	/*begin::Students*/

	/*begin::AgeGroups*/
	include('AgeGroups/AgeGroups.php');
	/*begin::AgeGroups*/

	/*begin::Settings*/
	include('Settings/Settings.php');
	/*end::Settings*/

	/*begin::PlansPricing*/
	include('PlansPricing/PlansPricing.php');
	/*end::PlansPricing*/

	/*begin::Payments*/
	include('Payments/Payments.php');
	/*end::Payments*/

	/*begin::Paypal*/
	include('Paypal/Paypal.php');
	/*end::Paypal*/

	/*begin::Account*/
	include('Account/AdminAccount.php');
	/*end::Account*/

	/*begin::Articles*/
	include('Articles/AdminArticles.php');
	/*end::Articles*/

	/*begin::Competetions*/
	include('Competetions/AdminCompetetions.php');
	/*end::Competetions*/

	/*begin::CompileResults*/
	include('CompileResults/AdminCompileResults.php');
	/*end::CompileResults*/
});
?>
