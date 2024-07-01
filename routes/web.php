<?php
use App\Alert;
use App\AgeGroup;
use App\CompetetionData;
use App\PlanSubscription;
use App\Http\Helpers\User;
use App\User as UserModel;
use App\StudentReadArticle;
use Illuminate\Http\Request;
use App\StudentViewedArticle;
use App\Http\Helpers\Website;
use App\StudentPaypalAccount;
use App\Http\Helpers\Admin\Plan;
use App\Http\Helpers\UserHelper;
use App\Article as ArticleModel;
use App\Http\Helpers\Admin\Paypal;
use App\Http\Helpers\Admin\Setting;
use App\Http\Helpers\Admin\Article;
use App\Http\Helpers\Writer\Writer;
use Illuminate\Support\Facades\Auth;
use App\Http\Helpers\Student\Student;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use App\ParticipantCompetetionStatus;
use App\Http\Helpers\Admin\Competetion;
use App\Competetion as CompetetionModel;
use Stevebauman\Location\Facades\Location;
use Codebyray\ReviewRateable\Models\Rating;
use App\Http\Helpers\Subscription\Subscription;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('debug', function () {

dd(Writer::CountSubmittedInCompetetion(3,1));
for ($i=1; $i < 11; $i++) { 
	ArticleModel::create([
		'user_id' => 3,
		'plan_id' => 1,
		'status' => 'ACTIVE',
		'visibility' => 'PUBLISHED',
		'title' => 'hjkhjkhjgjhghfhgfgfdgdfgdfg'.$i.$i,$i,
		'content' => 'hjkhjkhklkljkkljkjkjkjkjlkjkljkljgjhghfhgfgfdgdfgdfg'.$i.$i,$i,
		'feature_image' => 'bc6f1264b6f8db21c28e8885f5a9df68money_PNG3546.png',
	]);
}

dd(Article::Views(22));
//return Auth::loginUsingId(3);
});

/*begin::Admin Routes*/
include('Admin/Admin.php');
/*end::Admin Routes*/

/*begin::Writer Routes*/
include('Writer/Writer.php');
/*end::Writer Routes*/

/*begin::Reader Routes*/
include('Reader/Reader.php');
/*end::Reader Routes*/

/*begin::Auth Routes*/
include('Auth/AuthRoutes.php');
/*end::Auth Routes*/

/*begin::LandingPage Routes*/
include('LandingPage/LandingPageRoutes.php');
/*end::LandingPage Routes*/

Route::post('EndCompetetion', 'CompetetionController@EndCompetetion')
->name('EndCompetetion');

Auth::routes();
