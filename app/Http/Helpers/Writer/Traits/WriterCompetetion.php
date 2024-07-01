<?php 
namespace App\Http\Helpers\Writer\Traits;
use App\User;
use DateTime;
use App\Article;
use App\CompetetionData;
use App\WriterViewedArticle;
use App\Http\Helpers\Writer\Writer;
use Illuminate\Support\Facades\Auth;
use App\Competetion as CompetetionModel;


trait WriterCompetetion
{
	public static function JoinedCompetetions($user)
	{
		$competetions = CompetetionData::where('user_id',$user);
		if (!($competetions->get())->isEmpty()) {
			$ids = $competetions->pluck('competetions_id')->unique()->toArray();
			return CompetetionModel::whereIn('id',$ids);
		}else{
			return false;
		}
	}

	public static function HasJoinedCompetetion($user,$competetion)
	{
		if ($competetions = self::JoinedCompetetions($user)) {
			$find = $competetions->where('id',$competetion)->first();
			if (!is_null($find)) {
				return $find;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	public static function CountJoinedCompetetions($user)
	{
		if ($competetions = self::JoinedCompetetions($user)->get()) {
			return $competetions->count();
		}else{
			return 0;
		}
	}

	public static function JoinedCompetetionsWithPlan($user,$subscription)
	{
		$competetions = CompetetionData::where('user_id',$user)
		->where('subscription_id',$subscription);
		if (!($competetions->get())->isEmpty()) {
			$ids = $competetions->pluck('competetions_id')->unique()->toArray();
			return CompetetionModel::whereIn('id',$ids);
		}else{
			return false;
		}
	}

	public static function CountJoinedCompetetionsWithPlan($user,$subscription)
	{
		if ($competetions = self::JoinedCompetetionsWithPlan($user,$subscription)) {
			return $competetions->count();
		}else{
			return 0;
		}
	}

	public static function TotalSubmitted($user)
	{
		$submitted = CompetetionData::where('user_id',$user)->get();
		if (($submitted )->isNotEmpty()) {
			return $submitted;
		}else{
			return false;
		}
	}

	public static function CountTotalSubmitted($user)
	{
		if ($submitted = self::TotalSubmitted($user)) {
			return $submitted->count();
		}else{
			return 0;
		}
	}

	public static function CountSubmittedInCompetetion($user,$competetion)
	{
		if ($submitted = self::TotalSubmitted($user)) {
			return $submitted->where('competetions_id',$competetion)->count();
		}else{
			return 0;
		}
	}

	public static function CountSubmittedWithSubscription($user,$competetion,$subscription)
	{
		if ($submitted = self::TotalSubmitted($user)) {
			return $submitted->where('competetions_id',$competetion)
			->where('subscription_id  ',$subscription)->count();
		}else{
			return 0;
		}
	}

	public static function ArticleSubmittedWithSubscription($user,$competetion,$subscription,$article)
	{
		if ($submitted = self::TotalSubmitted($user)) {
			$article = $submitted->where('competetions_id',$competetion)
			->where('subscription_id',$subscription)
			->where('article_id',$article)->first();
			if (!is_null($article)) {
				return $article;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	public static function ArticleIsSubmitted($user,$article)
	{
		if ($submitted = self::TotalSubmitted($user)) {
			if (!is_null($submitted = $submitted->where('article_id',$article)->first())) {
				return $submitted;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
}
