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
use App\Http\Helpers\Website;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use App\ParticipantCompetetionStatus;
use App\Competetion as CompetetionModel;
use Codebyray\ReviewRateable\Models\Rating;
use App\Http\Helpers\Admin\Traits\Plans\Plans;
use App\Http\Helpers\Subscription\Traits\Subscriptions;
use App\Http\Helpers\Admin\Traits\Competetion\Competetions;

trait QualifiedStatus
{

	/*Plan Competetion Joining Limit*/
	public static function PlanJoiningLimit($plan)
	{
		if (!is_null($features = Plans::Features($plan))) {
			if (!is_null($features->competetion_quantity)) {
				return $features->competetion_quantity;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	/*Plan Articles Writing Limit*/
	public static function PlanWritingLimit($plan)
	{
		if (!is_null($features = Plans::Features($plan))) {
			if (!is_null($features->writing_quantity)) {
				return $features->writing_quantity;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	/*Plan Articles Submitting Limit*/
	public static function PlanSubmittingLimit($plan)
	{
		if (!is_null($features = Plans::Features($plan))) {
			if (!is_null($features->submit_quantity)) {
				return $features->submit_quantity;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	/*Plan Articles Reading Limit*/
	public static function PlanReadingLimit($plan)
	{
		if (!is_null($features = Plans::Features($plan))) {
			if (!is_null($features->reading_quantity)) {
				return $features->reading_quantity;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	/*Plan Articles Rating Limit*/
	public static function PlanRatingLimit($plan)
	{
		if (!is_null($features = Plans::Features($plan))) {
			if (!is_null($features->rating_quantity)) {
				return $features->rating_quantity;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}


	/*Plan Can Update after Joined*/
	public static function PlanCanUpdateAfterJoined($plan)
	{
		if (!is_null($features = Plans::Features($plan))) {
			if ($features->can_update_after_joined == "true") {
				return $features->can_update_after_joined;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	/*Participant Can Submit Maximum in Order to Qualify*/
	public static function ParticipantCanSubmitMaximum($participant)
	{
		if ($active = Subscriptions::hasAnySubscription($participant)) {
			return self::PlanSubmittingLimit($active->plan_id);
		}elseif($last = Subscriptions::hadAnyLastSubscription($participant)){
			return self::PlanSubmittingLimit($last->plan_id);
		}else{
			return false;
		}
	}


	/*Participant Should Submit in Order to Qualify*/
	public static function ParticipantShouldSubmit($competetion,$participant)
	{
		if ($active = Subscriptions::hasAnySubscription($participant)) {
			$submitted = Competetions::CountParticipantSubmittedArticles($competetion,$participant);
			if ($submitted == self::PlanSubmittingLimit($active->plan_id) OR $submitted < self::PlanSubmittingLimit($active->plan_id)) {
				return self::PlanSubmittingLimit($active->plan_id);
			}else{
				return false;
			}
		}elseif($last = Subscriptions::hadAnyLastSubscription($participant)){
			$submitted = Competetions::CountParticipantSubmittedArticles($competetion,$participant);
			if ($submitted == self::PlanSubmittingLimit($last->plan_id) OR $submitted < self::PlanSubmittingLimit($last->plan_id)) {
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	/*Participant Need To Read in Order to Qualify*/
	public static function ParticipantNeedToRead($participant)
	{
		if ($active = Subscriptions::hasAnySubscription($participant)) {
			return self::PlanReadingLimit($active->plan_id);
		}elseif($last = Subscriptions::hadAnyLastSubscription($participant)){
			return self::PlanReadingLimit($last->plan_id);
		}else{
			return false;
		}
	}

	/*Participant Should Read in Order to Qualify*/
	public static function ParticipantShouldRead($competetion,$participant)
	{
		if ($active = Subscriptions::hasAnySubscription($participant)) {
			$read = Competetions::CountParticipantReadArticles($competetion,$participant);
			if ($read == self::PlanReadingLimit($active->plan_id)) {
				return self::PlanReadingLimit($active->plan_id);
			}else{
				return false;
			}
		}elseif($last = Subscriptions::hadAnyLastSubscription($participant)){
			$read = Competetions::CountParticipantReadArticles($competetion,$participant);
			if ($read == self::PlanReadingLimit($last->plan_id)) {
				return self::PlanReadingLimit($last->plan_id);
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	/*Participant Need To Rate in Order to Qualify*/
	public static function ParticipantNeedToRate($participant)
	{
		if ($active = Subscriptions::hasAnySubscription($participant)) {
			return self::PlanRatingLimit($active->plan_id);
		}elseif($last = Subscriptions::hadAnyLastSubscription($participant)){
			return self::PlanRatingLimit($last->plan_id);
		}else{
			return false;
		}
	}

	/*Participant Should Rate in Order to Qualify*/
	public static function ParticipantShouldRate($competetion,$participant)
	{
		if ($active = Subscriptions::hasAnySubscription($participant)) {
			$rated = Competetions::CountParticipantRatedArticles($competetion,$participant);
			if ($rated == self::PlanReadingLimit($active->plan_id)) {
				return self::PlanReadingLimit($active->plan_id);
			}else{
				return false;
			}
		}elseif($last = Subscriptions::hadAnyLastSubscription($participant)){
			$rated = Competetions::CountParticipantRatedArticles($competetion,$participant);
			if ($rated == self::PlanReadingLimit($last->plan_id)) {
				return self::PlanReadingLimit($last->plan_id);
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	/*Qualified Participant in an Age Group*/
	public static function ParticipantIsQualified($competetion,$participant)
	{
		if (self::ParticipantShouldSubmit($competetion,$participant)) {
			if (self::ParticipantShouldRead($competetion,$participant)) {
				if (self::ParticipantShouldRate($competetion,$participant)) {
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

	/*Qualified Participant in an Age Group*/
	public static function QualifiedParticipantInAgeGroup($competetion,$group,$participant)
	{

	}



}
