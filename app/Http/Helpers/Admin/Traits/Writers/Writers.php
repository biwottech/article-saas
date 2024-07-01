<?php 
namespace App\Http\Helpers\Admin\Traits\Writers;

use App\User;
use App\Article;
use App\AgeGroup;
use App\Competetion;
use App\CompetetionData;
use App\WriterPaypalAccount;

trait Writers
{
	/*All writers*/
	public static function All()
	{
		if (!($writers = User::withTrashed()->where('role_id',2)->where('type','Writer')->get())->isEmpty()) {
			return $writers;
		}else{
			return false;
		}
	}

	public static function AllWithPagination($number)
	{
		if (!($writers = User::withTrashed()->where('role_id',2)->where('type','Writer')->paginate($number))->isEmpty()) {
			return $writers;
		}else{
			return false;
		}
	}

	/*Count All writers*/
	public static function CountAll()
	{
		if ($writers = self::All()) {
			return $writers->count();
		}else{
			return 0;
		}
	}

	/*Count Blocked writers*/
	public static function CountBlocked()
	{
		if ($writers = User::onlyTrashed()->where('role_id',2)->where('type','Writer')) {
			return $writers->count();
		}else{
			return 0;
		}
	}

	/*Count Active writers*/
	public static function CountActive()
	{
		if ($writers = User::all()) {
			return $writers->where('role_id',2)->where('type','Writer')->count();
		}else{
			return 0;
		}
	}

	/*Student Group*/
	public static function Group($group_id)
	{
		if (!is_null($group = AgeGroup::find($group_id))) {
			return $group->group_from.' - '.$group->group_to.' Years';
		}else{
			return false;
		}
	}


	/*All Articles of a Specific Student*/
	public static function Articles($student)
	{
		if ($writers = self::All()) {
			if (!($articles = Article::withTrashed()->where('user_id',$student)->get())->isEmpty()) {
				return $articles;
				}	
		}else{
			return false;
		}
	}

	/*Count All Articles of a Specific Student*/
	public static function CountArticles($student)
	{
		if ($writers = self::All()) {
			if (!($articles = Article::withTrashed()->where('user_id',$student)->get())->isEmpty()) {
					return $articles->count();
				}else{
					return 0;
				}	
		}else{
			return 0;
		}
	}

	/*Count All Banned Articles of a Specific Student*/
	public static function CountBannedArticles($student)
	{
		if ($writers = self::All()) {
			$articles = Article::withTrashed()->where('user_id',$student)
						->where('status',"BANNED")->get();
			if (!($articles)->isEmpty()) {
					return $articles->count();
				}else{
					return 0;
				}	
		}else{
			return 0;
		}
	}

	/*Count All Archived Articles of a Specific Student*/
	public static function CountArchivedArticles($student)
	{
		if ($writers = self::All()) {
			$articles = Article::withTrashed()->where('user_id',$student)
						->where('visibility',"ARCHIVED")->get();
			if (!($articles)->isEmpty()) {
					return $articles->count();
				}else{
					return 0;
				}	
		}else{
			return 0;
		}
	}

	/*Count All Published Articles of a Specific Student*/
	public static function CountPublishedArticles($student)
	{
		if ($writers = self::All()) {
			$articles = Article::withTrashed()->where('user_id',$student)
						->where('visibility',"PUBLISHED")->get();
			if (!($articles)->isEmpty()) {
					return $articles->count();
				}else{
					return 0;
				}	
		}else{
			return 0;
		}
	}

	/*Find a Specific Student*/
	public static function FindSpecific($student)
	{
		if ($writers = self::All()) {
			if (!is_null($student = $writers->find($student))) {
				return $student;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	/*Student PaypalAccounts*/
	public static function PaypalAccounts($student)
	{
		if ($writers = self::FindSpecific($student)) {
			return $writers->PayPalAccounts;
		}else{
			return false;
		}
	}

	/*Student Count PaypalAccounts*/
	public static function  CountPaypalAccounts($student)
	{
		if ($writers = self::FindSpecific($student)) {
			return $writers->PayPalAccounts->count();
		}else{
			return 0;
		}
	}

	/*Specific Student PaypalAccount Belongs to Specific User*/
	public static function SpecificPaypalAccount($account)
	{
		if (!is_null($account = StudentPaypalAccount::find($account))) {
			return $account;
		}else{
			return false;
		}
	}

	/*Student Competetions*/
	public static function Competetions($student)
	{
		if ($user = self::FindSpecific($student)) {
			$competetions =  CompetetionData::where('user_id',$user->id)->pluck('competetions_id')->unique();
			if (!($competetions)->isEmpty()) {
				return $competetions;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	/*Student Count Competetions*/
	public static function CountCompetetions($student)
	{
		if ($user = self::FindSpecific($student)) {
			$competetions =  CompetetionData::where('user_id',$user->id)->get();
			if (!($competetions)->isEmpty()) {
				return $competetions->pluck('competetions_id')->unique()->count();
			}else{
				return 0;
			}
		}else{
			return 0;
		}
	}

	/*Student Count Initializing Competetions*/
	public static function CountInitializingCompetetions($student)
	{
		if ($user = self::FindSpecific($student)) {
			$competetions =  CompetetionData::where('user_id',$user->id)->get();
			if (!($competetions)->isEmpty()) {
				$ids = $competetions->pluck('competetions_id')->unique();
				$competetions = Competetion::whereIn('id',$ids);
				$competetions = $competetions->where('status','INITIALIZING');
				return $competetions->count();
			}else{
				return 0;
			}
		}else{
			return 0;
		}
	}

	/*Student Count Started Competetions*/
	public static function CountStartedCompetetions($student)
	{
		if ($user = self::FindSpecific($student)) {
			$competetions =  CompetetionData::where('user_id',$user->id)->get();
			if (!($competetions)->isEmpty()) {
				$ids = $competetions->pluck('competetions_id')->unique();
				$competetions = Competetion::whereIn('id',$ids);
				$competetions = $competetions->where('status','STARTED');
				return $competetions->count();
			}else{
				return 0;
			}
		}else{
			return 0;
		}
	}

	/*Student Count Paused Competetions*/
	public static function CountPausedCompetetions($student)
	{
		if ($user = self::FindSpecific($student)) {
			$competetions =  CompetetionData::where('user_id',$user->id)->get();
			if (!($competetions)->isEmpty()) {
				$ids = $competetions->pluck('competetions_id')->unique();
				$competetions = Competetion::whereIn('id',$ids);
				$competetions = $competetions->where('status','PAUSED');
				return $competetions->count();
			}else{
				return 0;
			}
		}else{
			return 0;
		}
	}

	/*Student Count Ended Competetions*/
	public static function CountEndedCompetetions($student)
	{
		if ($user = self::FindSpecific($student)) {
			$competetions =  CompetetionData::where('user_id',$user->id)->get();
			if (!($competetions)->isEmpty()) {
				$ids = $competetions->pluck('competetions_id')->unique();
				$competetions = Competetion::whereIn('id',$ids);
				$competetions = $competetions->where('status','ENDED');
				return $competetions->count();
			}else{
				return 0;
			}
		}else{
			return 0;
		}
	}

	/*Student Count Pending Competetions*/
	public static function CountPendingCompetetions($student)
	{
		if ($user = self::FindSpecific($student)) {
			$competetions =  CompetetionData::where('user_id',$user->id)->get();
			if (!($competetions)->isEmpty()) {
				$ids = $competetions->pluck('competetions_id')->unique();
				$competetions = Competetion::whereIn('id',$ids);
				$competetions = $competetions->where('result_status','PENDING');
				return $competetions->count();
			}else{
				return 0;
			}
		}else{
			return 0;
		}
	}

	/*Student Count Announced Competetions*/
	public static function CountAnnouncedCompetetions($student)
	{
		if ($user = self::FindSpecific($student)) {
			$competetions =  CompetetionData::where('user_id',$user->id)->get();
			if (!($competetions)->isEmpty()) {
				$ids = $competetions->pluck('competetions_id')->unique();
				$competetions = Competetion::whereIn('id',$ids);
				$competetions = $competetions->where('result_status','ANNOUNCED');
				return $competetions->count();
			}else{
				return 0;
			}
		}else{
			return 0;
		}
	}
}
