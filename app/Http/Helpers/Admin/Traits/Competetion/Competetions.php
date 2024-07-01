<?php 

namespace App\Http\Helpers\Admin\Traits\Competetion;
use App\User;
use App\Plan;
use DateTime;
use App\Result;
use App\Article;
use App\AgeGroup;
use App\PlanFeature;
use App\CompetetionData;
use App\WriterReadArticle;
use App\CompetetionSetting;
use App\Http\Helpers\Website;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use App\ParticipantCompetetionStatus;
use App\Competetion as CompetetionModel;
use Codebyray\ReviewRateable\Models\Rating;
use App\Http\Helpers\Subscription\Traits\Subscriptions;

trait Competetions
{

	public static function FetchAll()
	{
		if (!($fetch = CompetetionModel::all())->isEmpty()) {
			return $fetch;
		}else{
			return false;
		}
	}

	public static function FetchAllWithPagination($quantity)
	{
		if (!($fetch = CompetetionModel::paginate($quantity))->isEmpty()) {
			return $fetch;
		}else{
			return false;
		}
	}

	public static function CountAll()
	{
		if (!($fetch = CompetetionModel::all())->isEmpty()) {
			return $fetch->count();
		}else{
			return 0;
		}
	}

	public static function Settings($competetion)
	{
		if (!is_null($find = CompetetionModel::find($competetion))) {
			$settings = CompetetionSetting::where('competetions_id',$find->id)->first();
			if (!is_null($settings)) {
				return $settings;
			}else{
				return CompetetionSetting::create(['competetions_id' => $find->id]);
			}
		}else{
			return false;
		}
	}

	public static function IsInitializing($competetion)
	{
		if (!is_null($find = CompetetionModel::find($competetion))) {
			if ($find->status === "INITIALIZING") {
				return $find;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	public static function IsStarted($competetion)
	{
		if (!is_null($find = CompetetionModel::find($competetion))) {
			if ($find->status === "STARTED") {
				return $find;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	public static function IsEnded($competetion)
	{
		if (!is_null($find = CompetetionModel::find($competetion))) {
			if ($find->status === "ENDED") {
				return $find;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	public static function IsPaused($competetion)
	{
		if (!is_null($find = CompetetionModel::find($competetion))) {
			if ($find->status === "PAUSED") {
				return $find;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	public static function IsResumed($competetion)
	{
		if (!is_null($find = CompetetionModel::find($competetion))) {
			if ($find->status === "RESUMED") {
				return $find;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	public static function Start($competetion)
	{
		if (!is_null($find = CompetetionModel::find($competetion))) {
			if ($find->status === "INITIALIZING") {
				if ($find->starting_date === date('Y-m-d') OR $find->starting_date < date('Y-m-d')) {
	                if ($find->update(['status' => 'STARTED'])) {
	                    return true;
	                }else{
	                    return false;
	                }
				}else{
					return false;
				}
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	public static function End($competetion)
	{
		if (!is_null($find = CompetetionModel::find($competetion))) {
			if ($find->status === "STARTED" OR $find->status === "PAUSED") {
				if ($find->ending_date === date('Y-m-d') OR $find->ending_date < date('Y-m-d')) {
	                if ($find->update(['status' => 'ENDED','ended_at' => date('Y-m-d'),'result_status' => 'PENDING'])) {

	                    return true;

	                }else{
	                    return false;
	                }
				}else{
					return false;
				}
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	public static function ResultIsAnnounced($competetion)
	{
		if (!is_null($find = CompetetionModel::find($competetion))) {
			if ($find->result_status === "ANNOUNCED") {
				return $find;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	public static function ResultIsPending($competetion)
	{
		if (!is_null($find = CompetetionModel::find($competetion))) {
			if ($find->result_status === "PENDING") {
				return $find;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	public static function HasNoResult($competetion)
	{
		if (!is_null($find = CompetetionModel::find($competetion))) {
			if (is_null($find->result_status)) {
				return $find;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	public static function CanResume($competetion)
	{
		if (!(self::IsEnded($competetion))) {
			return true;
		}else{
			return false;
		}
	}

	public static function CanPause($competetion)
	{
		if (!(self::IsEnded($competetion))) {
			return true;
		}else{
			return false;
		}
	}

	public static function CanStart($competetion)
	{
		if (!(self::IsEnded($competetion))) {
			if (self::IsInitializing($competetion)) {
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}


	public static function Initializing()
	{
		$competetions = CompetetionModel::where('status','INITIALIZING')->get();
		if (!($competetions)->isEmpty()) {
			return $competetions;
		}else{
			return false;
		}
	}

	public static function CountInitializing()
	{
		$competetions = CompetetionModel::where('status','INITIALIZING')->get();
		if (!($competetions)->isEmpty()) {
			return $competetions->count();
		}else{
			return 0;
		}
	}

	public static function Started()
	{
		$competetions = CompetetionModel::where('status','STARTED')->get();
		if (!($competetions)->isEmpty()) {
			return $competetions;
		}else{
			return false;
		}
	}

	public static function CountStarted()
	{
		$competetions = CompetetionModel::where('status','STARTED')->get();
		if (!($competetions)->isEmpty()) {
			return $competetions->count();
		}else{
			return 0;
		}
	}

	public static function Paused()
	{
		$competetions = CompetetionModel::where('status','PAUSED')->get();
		if (!($competetions)->isEmpty()) {
			return $competetions;
		}else{
			return false;
		}
	}

	public static function CountPaused()
	{
		$competetions = CompetetionModel::where('status','PAUSED')->get();
		if (!($competetions)->isEmpty()) {
			return $competetions->count();
		}else{
			return 0;
		}
	}

	public static function Ended()
	{
		$competetions = CompetetionModel::where('status','ENDED')->get();
		if (!($competetions)->isEmpty()) {
			return $competetions;
		}else{
			return false;
		}
	}

	public static function CountEnded()
	{
		$competetions = CompetetionModel::where('status','ENDED')->get();
		if (!($competetions)->isEmpty()) {
			return $competetions->count();
		}else{
			return 0;
		}
	}

	/*Student Who Participants*/
	public static function TotalParticipants($competetion)
	{
		if (!is_null($competetion = CompetetionModel::find($competetion))) {
		$ids = CompetetionData::where('competetions_id',$competetion->id)->pluck('user_id')->unique()->toArray();
			return User::withTrashed()
					   ->whereIn('id',$ids)
					   ->where('role_id',2)
					   ->where('type','Writer');
		}else{
			return false;
		}

	}

	/*Count Student Who Participants*/
	public static function CountTotalParticipants($competetion)
	{
		if (!is_null($competetion = CompetetionModel::find($competetion))) {
		$ids = CompetetionData::where('competetions_id',$competetion->id)->pluck('user_id')->unique()->toArray();
			return User::withTrashed()
					   ->whereIn('id',$ids)
					   ->where('role_id',2)
					   ->where('type','Writer')
					   ->count();
		}else{
			return 0;
		}
	}

	/*Count Blocked Student Who Participants*/
	public static function CountBlockedParticipants($competetion)
	{
		if (!is_null($competetion = CompetetionModel::find($competetion))) {
		$ids = CompetetionData::where('competetions_id',$competetion->id)->pluck('user_id')->unique()->toArray();
			return User::onlyTrashed()
					   ->whereIn('id',$ids)
					   ->where('role_id',2)
					   ->where('type','Writer')
					   ->count();
		}else{
			return 0;
		}
	}

	/*Count Active Student Who Participants*/
	public static function CountActiveParticipants($competetion)
	{
		if (!is_null($competetion = CompetetionModel::find($competetion))) {
		$ids = CompetetionData::where('competetions_id',$competetion->id)->pluck('user_id')->unique()->toArray();
			return User::whereIn('id',$ids)
					   ->where('role_id',2)
					   ->where('type','Writer')
					   ->count();
		}else{
			return 0;
		}
	}

	/*****begin::Articles*****/
	/*Submitted Articles*/
	public static function TotalSubmittedArticles($competetion)
	{
		$articles = CompetetionData::where('competetions_id',$competetion)
		 			->pluck('article_id')
		 			->unique()
		 			->toArray();
		if (!is_null($articles)) {
			return Article::withTrashed()->whereIn('id',$articles);
		}else{
			return false;
		}
	}

	/*Count Total Submitted Articles*/
	public static function CountTotalSubmittedArticles($competetion)
	{
		$articles = CompetetionData::where('competetions_id',$competetion)
		 			->pluck('article_id')
		 			->unique()
		 			->toArray();
		if (!is_null($articles)) {
			return Article::withTrashed()->whereIn('id',$articles)->count();
		}else{
			return false;
		}
	}

	/*Count Submitted Published Articles*/
	public static function CountSubmittedPublishedArticles($competetion)
	{
		$articles = CompetetionData::where('competetions_id',$competetion)
		 			->pluck('article_id')
		 			->unique()
		 			->toArray();
		if (!is_null($articles)) {
			return Article::whereIn('id',$articles)->where('visibility','PUBLISHED')->count();
		}else{
			return false;
		}
	}

	/*Count Submitted Archived Articles*/
	public static function CountSubmittedArchivedArticles($competetion)
	{
		$articles = CompetetionData::where('competetions_id',$competetion)
		 			->pluck('article_id')
		 			->unique()
		 			->toArray();
		if (!is_null($articles)) {
			return Article::whereIn('id',$articles)->where('visibility','ARCHIVED')->count();
		}else{
			return false;
		}
	}

	/*Count Submitted Banned Articles*/
	public static function CountSubmittedBannedArticles($competetion)
	{
		$articles = CompetetionData::where('competetions_id',$competetion)
		 			->pluck('article_id')
		 			->unique()
		 			->toArray();
		if (!is_null($articles)) {
			return Article::whereIn('id',$articles)->where('status','BANNED')->count();
		}else{
			return false;
		}
	}

	/*Participant Submitted Articles*/
	public static function ParticipantSubmittedArticles($competetion,$participant)
	{
		$articles = CompetetionData::where('competetions_id',$competetion)
					->where('user_id',$participant)
		 			->pluck('article_id')
		 			->unique()
		 			->toArray();
		if (!is_null($articles)) {
			if (!Article::whereIn('id',$articles)->get()->isEmpty()) {
				return Article::whereIn('id',$articles)->get();
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	/*Count Participant Submitted Articles*/
	public static function CountParticipantSubmittedArticles($competetion,$participant)
	{
		$articles = CompetetionData::where('competetions_id',$competetion)
					->where('user_id',$participant)
		 			->pluck('article_id')
		 			->unique()
		 			->toArray();
		if (!is_null($articles)) {
			if (!Article::whereIn('id',$articles)->get()->isEmpty()) {
				return Article::whereIn('id',$articles)->count();
			}else{
				return 0;
			}
		}else{
			return 0;
		}
	}
	/*****end::Articles*****/

	/*Participants in an Age Group*/
	public static function ParticipantsInAgeGroup($competetion,$group)
	{	
		if (!is_null($competetion = CompetetionModel::find($competetion))) {
		$ids = CompetetionData::where('competetions_id',$competetion->id)->pluck('user_id')->unique()->toArray();
			return User::whereIn('id',$ids)
				   ->where('age_group_id',$group)
				   ->where('role_id',2)
				   ->where('type','Writer');
		}else{
			return false;
		}
	}

	/*Count Participants in an Age Group*/
	public static function CountParticipantsInAgeGroup($competetion,$group)
	{	
		if (!is_null($competetion = CompetetionModel::find($competetion))) {
		$ids = CompetetionData::where('competetions_id',$competetion->id)->pluck('user_id')->unique()->toArray();
			return User::whereIn('id',$ids)
				   ->where('age_group_id',$group)
				   ->where('role_id',2)
				   ->where('type','Writer')
				   ->count();
		}else{
			return 0;
		}
	}

	/*************************************************************/
/********************BEGIN:: ARTICLES IN AGE GROUP*******************/
	/*************************************************************/

	/*Total Articles in an Age Group*/
	public static function ArticlesInAgeGroup($competetion,$group)
	{	
		if ($participants = self::ParticipantsInAgeGroup($competetion,$group)) {
			if ($articles = self::TotalSubmittedArticles($competetion)) {
				$participants = $participants->pluck('id')->toArray();
				return $articles->whereIn('user_id',$participants);
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	/*Count Articles in an Age Group*/
	public static function CountArticlesInAgeGroup($competetion,$group)
	{	
		if ($participants = self::ParticipantsInAgeGroup($competetion,$group)) {
			if ($articles = self::TotalSubmittedArticles($competetion)) {
				$participants = $participants->pluck('id')->toArray();
				return $articles->whereIn('user_id',$participants)
								->count();
			}else{
				return 0;
			}
		}else{
			return 0;
		}
	}

	/*Count Published Articles in an Age Group*/
	public static function CountPublishedArticlesInAgeGroup($competetion,$group)
	{	
		if ($participants = self::ParticipantsInAgeGroup($competetion,$group)) {
			if ($articles = self::TotalSubmittedArticles($competetion)) {
				$participants = $participants->pluck('id')->toArray();
				return $articles->whereIn('user_id',$participants)
								->where('visibility','PUBLISHED')
								->count();
			}else{
				return 0;
			}
		}else{
			return 0;
		}
	}

	/*Count Archived Articles in an Age Group*/
	public static function CountArchivedArticlesInAgeGroup($competetion,$group)
	{	
		if ($participants = self::ParticipantsInAgeGroup($competetion,$group)) {
			if ($articles = self::TotalSubmittedArticles($competetion)) {
				$participants = $participants->pluck('id')->toArray();
				return $articles->whereIn('user_id',$participants)
								->where('visibility','ARCHIVED')
								->count();
			}else{
				return 0;
			}
		}else{
			return 0;
		}
	}

	/*Count Banned Articles in an Age Group*/
	public static function CountBannedArticlesInAgeGroup($competetion,$group)
	{	
		if ($participants = self::ParticipantsInAgeGroup($competetion,$group)) {
			if ($articles = self::TotalSubmittedArticles($competetion)) {
				$participants = $participants->pluck('id')->toArray();
				return $articles->whereIn('user_id',$participants)
								->where('status','BANNED')
								->count();
			}else{
				return 0;
			}
		}else{
			return 0;
		}
	}


	/*************************************************************/
/********************END::ARTICLES IN AGE GROUP*********************/
	/*************************************************************/

	/*Articles Reads/Views*/
	public static function CountArticlesViews($competetion,$article)
	{	
		if ($views = WriterReadArticle::where('competetions_id',$competetion)) {
			if ($views->where('article_id',$article)->count() > 0) {
				return $views->where('article_id',$article)->count();
			}else{
				return 0;
			}
		}else{
			return 0;
		}
	}


	/*Total Age Groups*/
	public static function TotalAgeGroups($competetion)
	{
		if ($participants = self::TotalParticipants($competetion)) {
			$participants = $participants
							->pluck('age_group_id')
							->unique()
							->toArray();
			if ($participants) {
				return AgeGroup::whereIn('id',$participants);
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	/*CountTotal Age Groups*/
	public static function CountTotalAgeGroups($competetion)
	{
		if ($participants = self::TotalParticipants($competetion)) {
			$participants = $participants
							->pluck('age_group_id')
							->unique()
							->toArray();
			if ($participants) {
				return AgeGroup::find($participants)
								 ->count();
			}else{
				return 0;
			}
		}else{
			return 0;
		}
	}

	/*Total Rated Articles*/
	public static function TotalRatedArticles($competetion)
	{
			$articles = Rating::where('competetions_id',$competetion)
						->pluck('reviewrateable_id')
			 			->unique();
			if (!($articles)->isEmpty()) {
				return Article::withTrashed()->whereIn('id',$articles);
			}else{
				return false;
			}
	}

	/*CountTotal Rated Articles*/
	public static function CountTotalRatedArticles($competetion)
	{
			$articles = Rating::where('competetions_id',$competetion)
						->pluck('reviewrateable_id')
			 			->unique();
			if (!($articles)->isEmpty()) {
				return Article::withTrashed()->whereIn('id',$articles)->count();
			}else{
				return 0;
			}
	}

	/*CountTotal Rated Banned Articles*/
	public static function CountRatedBannedArticles($competetion)
	{
			$articles = Rating::where('competetions_id',$competetion)
						->pluck('reviewrateable_id')
			 			->unique();
			if (!($articles)->isEmpty()) {
				return Article::whereIn('id',$articles)->where('status','BANNED')->count();
			}else{
				return 0;
			}
	}

	/*CountTotal Rated Archived Articles*/
	public static function CountRatedArchivedArticles($competetion)
	{
			$articles = Rating::where('competetions_id',$competetion)
						->pluck('reviewrateable_id')
			 			->unique();
			if (!($articles)->isEmpty()) {
				return Article::whereIn('id',$articles)->where('visibility','ARCHIVED')->count();
			}else{
				return 0;
			}
	}

	/*CountTotal Rated Published Articles*/
	public static function CountRatedPublishedArticles($competetion)
	{
			$articles = Rating::where('competetions_id',$competetion)
						->pluck('reviewrateable_id')
			 			->unique();
			if (!($articles)->isEmpty()) {
				return Article::whereIn('id',$articles)->where('visibility','PUBLISHED')->count();
			}else{
				return 0;
			}
	}

	/*Participant Rated Articles*/
	public static function ParticipantRatedArticles($competetion,$participant)
	{
			$articles = Rating::where('competetions_id',$competetion)
						->where('user_id',$participant)
						->pluck('reviewrateable_id')
			 			->unique()
			 			->toArray();
			if (!is_null($articles)) {
				if (!($article = Article::whereIn('id',$articles)
					->paginate(9))->isEmpty()) {
					return $article;
				}else{
					return false;
				}
			}else{
				return false;
			}
	}

	/*CountParticipant Rated Articles*/
	public static function CountParticipantRatedArticles($competetion,$participant)
	{
			$articles = Rating::where('competetions_id',$competetion)
						->where('user_id',$participant)
						->pluck('reviewrateable_id')
			 			->unique()
			 			->toArray();
			if (!is_null($articles)) {
				if (!($article = Article::whereIn('id',$articles)
					->paginate(9))->isEmpty()) {
					return $article->count();
				}else{
					return 0;
				}
			}else{
				return 0;
			}
	}

	/*Total Read Articles*/
	public static function TotalReadArticles($competetion)
	{
		$ids = WriterReadArticle::where('competetions_id',$competetion)
				   ->pluck('article_id')
				   ->unique()
				   ->toArray();
		return Article::withTrashed()->whereIn('id',$ids);
	}

	/*CountTotal Read Articles*/
	public static function CountTotalReadArticles($competetion)
	{
		$ids = WriterReadArticle::where('competetions_id',$competetion)
				   ->pluck('article_id')
				   ->unique()
				   ->toArray();
		if (!($articles = Article::withTrashed()->whereIn('id',$ids)->get())->isEmpty()) {
			return $articles->count();
		}else{
			return 0;
		}
	}

	/*Count Published Read Articles*/
	public static function CountReadPublishedArticles($competetion)
	{
		$ids = WriterReadArticle::where('competetions_id',$competetion)
				   ->pluck('article_id')
				   ->unique()
				   ->toArray();
		$articles = Article::withTrashed()->whereIn('id',$ids)->where('visibility','PUBLISHED')->get();
		if (!($articles)->isEmpty()) {
			return $articles->count();
		}else{
			return 0;
		}
	}

	/*Count Archived Read Articles*/
	public static function CountReadArchivedArticles($competetion)
	{
		$ids = WriterReadArticle::where('competetions_id',$competetion)
				   ->pluck('article_id')
				   ->unique()
				   ->toArray();
		$articles = Article::withTrashed()->whereIn('id',$ids)->where('visibility','ARCHIVED')->get();
		if (!($articles)->isEmpty()) {
			return $articles->count();
		}else{
			return 0;
		}
	}

	/*Count Banned Read Articles*/
	public static function CountReadBannedArticles($competetion)
	{
		$ids = WriterReadArticle::where('competetions_id',$competetion)
				   ->pluck('article_id')
				   ->unique()
				   ->toArray();
		$articles = Article::withTrashed()->whereIn('id',$ids)->where('status','BANNED')->get();
		if (!($articles)->isEmpty()) {
			return $articles->count();
		}else{
			return 0;
		}
	}

	/*Participant Read Articles*/
	public static function ParticipantReadArticles($competetion,$participant)
	{
		$articles = WriterReadArticle::where('competetions_id',$competetion)
					->where('user_id',$participant)
		 			->pluck('article_id')
		 			->unique()
		 			->toArray();
		if (!is_null($articles)) {
				if (!(Article::whereIn('id',$articles)
					->get())->isEmpty()) {
					return Article::whereIn('id',$articles)
									->get();
				}else{
					return false;
				}
			}else{
				return false;
			}
	}

	/*CountParticipant Read Articles*/
	public static function CountParticipantReadArticles($competetion,$participant)
	{
		$articles = WriterReadArticle::where('competetions_id',$competetion)
					->where('user_id',$participant)
		 			->pluck('article_id')
		 			->unique()
		 			->toArray();
		if (!is_null($articles)) {
				if (!(Article::whereIn('id',$articles)
					->get())->isEmpty()) {
					return Article::whereIn('id',$articles)
									->count();
				}else{
					return 0;
				}
			}else{
				return 0;
			}
	}

	/*Article Added to List*/
	public static function ArticleAddedToWinningList($competetion,$article)
	{
		if (!is_null($competetion = CompetetionModel::find($competetion))) {
			if (!is_null($article = Article::find($article))) {
        	$added = Result::where('competetions_id',$competetion->id)
                         ->where('user_id',$article->user_id)
                         ->where('article_id',$article->id)
                         ->first();
            if (!is_null($added)) {
            	return true;
            }else{
            	return false;
            }
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	/*Group Added to List*/
	public static function GroupAddedToWinning($group,$competetion)
	{
		if (!is_null($competetion = CompetetionModel::find($competetion))) {
			if (!is_null($group = AgeGroup::find($group))) {
        	$added = Result::where('competetions_id',$competetion->id)
                         ->where('age_group_id',$group->id)
                         ->get();
            if (!is_null($added)) {
            	return $added;
            }else{
            	return 0;
            }
			}else{
				return 0;
			}
		}else{
			return 0;
		}
	}

	/*Count Articles Added to List*/
	public static function CountGroupAddedToWinning($group,$competetion)
	{
		if (!is_null($competetion = CompetetionModel::find($competetion))) {
			if (!is_null($group = AgeGroup::find($group))) {
        	$added = Result::where('competetions_id',$competetion->id)
                         ->where('age_group_id',$group->id)
                         ->get();
            if (!is_null($added)) {
            	return $added->count();
            }else{
            	return 0;
            }
			}else{
				return 0;
			}
		}else{
			return 0;
		}
	}

	/*Article Position Prize*/
	public static function ArticlePositionPrize($article,$competetion)
	{
		if (!is_null($competetion = CompetetionModel::find($competetion))) {
			if (!is_null($article = Article::find($article))) {
        	$result = Result::where('competetions_id',$competetion->id)
                         ->where('article_id',$article->id)
                         ->first();
            if (!is_null($result)) {
            	return $result;
            }else{
            	return false;
            }
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	/*Article Added to List*/
	public static function GroupArticleHasAlreadyPosition($competetion,$group,$article,$position)
	{
		if (!is_null($competetion = CompetetionModel::find($competetion))) {
			if (!is_null($group = AgeGroup::find($group))) {
        	$result = Result::where('competetions_id',$competetion->id)
                         ->where('age_group_id',$group->id);
            if (!is_null($result)) {
     			$result = $result->where('position',$position)
     							 ->where('article_id',$article)
     							 ->first();
     			if (!is_null($result)) {
     				return $result;
     			}else{
     				return false;
     			}
            }else{
            	return false;
            }
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	/*Qualified Participant in an Age Group*/
	public static function GroupReadyForAnnoucingResult($competetion,$group)
	{	
		$result = self::GroupAddedToWinning($group,$competetion);
		if ($result->where('position','!=',null)->count() === self::CountGroupAddedToWinning($group,$competetion)) {
			return true;
		}else{
			return false;
		}
	}


		/*Qualified Participant in an Age Group*/
	public static function AnnounceResult($competetion)
	{	
		if ($competetion = self::Information($competetion)) {
			$data = [
				'result' => 1,
				'result_status' => "ANNOUNCED",
				'result_date' => date('Y-m-d'),
			];
			if ($competetion->update($data)) {
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	/*begin::Pending Results*/
	public static function PendingResults()
	{
		$competetions = CompetetionModel::where('result_status','PENDING')->get();
		if (!($competetions)->isEmpty()) {
			return $competetions;
		}else{
			return false;
		}
	}
	public static function CountPendingResults()
	{
		$competetions = CompetetionModel::where('result_status','PENDING')->get();
		if (!($competetions)->isEmpty()) {
			return $competetions->count();
		}else{
			return 0;
		}
	}
	/*end::Pending Results*/

	/*begin::Announced Results*/
	public static function AnnouncedResults()
	{
		$competetions = CompetetionModel::where('result_status','ANNOUNCED')->get();
		if (!($competetions)->isEmpty()) {
			return $competetions;
		}else{
			return false;
		}
	}
	public static function CountAnnouncedResults()
	{
		$competetions = CompetetionModel::where('result_status','ANNOUNCED')->get();
		if (!($competetions)->isEmpty()) {
			return $competetions->count();
		}else{
			return 0;
		}
	}
	/*end::Announced Results*/


	//If Result has been Announced
	public static function Result($competetion)
	{
		if (self::ResultHasBeenAnnounced($competetion)) {
			if (!($result = Result::where('competetions_id',$competetion)->get())->isEmpty()) {
				return $result;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
}
