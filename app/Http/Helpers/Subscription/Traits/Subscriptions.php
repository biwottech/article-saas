<?php

namespace App\Http\Helpers\Subscription\Traits;

use App\User;
use App\Plan;
use App\Countries;
use App\PlanFeature;
use App\PlanCountries;
use App\PlanSubscription;
use Illuminate\Support\Facades\Auth;
use App\Http\Helpers\Admin\Traits\Plans\Plans;

trait Subscriptions
{

	/*begin::For Student*/
	public static function findPlan($plan)
	{
		if (!is_null($plan = Plan::find($plan))) {
			return $plan;
		}else{
			return false;
		}
	}

	public static function findPlanWithPriceId($plan)
	{
		if (!is_null($plan = Plan::where('price_id',$plan)->first())) {
			return $plan;
		}else{
			return false;
		}
	}


	public static function findPlanCountries($plan)
	{
		if ($plan = self::findPlan($plan)) {
			$countries = PlanCountries::where('plan_id',$plan->id)->get();
			if (!($countries)->isEmpty()) {
				return $countries;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	public static function IsValid($user)
	{
		if (!is_null($student = User::find($user))) {
			if ($student->role_id === 2) {
				if ($student->type === "Writer") {
					return $student;
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

	public static function Subscriptions($user)
	{
		if ($student = self::IsValid($user)) {
			return PlanSubscription::where('user_id',$student->id)
			->get();
		}else{
			return false;
		}
	}

	public static function CountSubscriptions($user)
	{
		if ($student = self::IsValid($user)) {
			return PlanSubscription::where('user_id',$student->id)
			->count();
		}else{
			return 0;
		}
	}

	public static function hasAnySubscription($user)
	{
		if ($student = self::IsValid($user)) {
			$subscription = PlanSubscription::where('user_id',$student->id)
			->where('plan_ends_at','>',date('Y-m-d h:i:s'))
			->first();
			if (!is_null($subscription)) {
				return $subscription;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	public static function hadAnyLastSubscription($user)
	{
		if ($student = self::IsValid($user)) {
			$subscription = PlanSubscription::where('user_id',$student->id)
			->where('plan_ends_at','<',date('Y-m-d h:i:s'))
			->where('plan_status','EXPIRED')
			->latest()->first();
			if (!is_null($subscription)) {
				return $subscription;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	public static function hasAnyActiveSubscription($user)
	{
		if ($student = self::IsValid($user)) {
			$subscription = PlanSubscription::where('user_id',$student->id)
			->where('plan_ends_at','>',date('Y-m-d h:i:s'))
			->where('plan_status','ACTIVE')
			->first();
			if (!is_null($subscription)) {
				return $subscription;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	public static function hasAlreadySubscribedToPlan($user,$plan)
	{
		if ($subscription = self::hasAnySubscription($user)) {
			if ($plan = self::findPlan($plan)) {
				if ($subscription->plan_id === $plan->id) {
					return $subscription;
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

	public static function SubscriptionIsActive($user,$plan)
	{
		if ($subscription = self::hasAnySubscription($user)) {
			if ($plan = self::findPlan($plan)) {
				$subscription = $subscription->where('plan_id',$plan->id)->first();
				if (!is_null($subscription )) {
					if ($subscription->plan_status === "ACTIVE") {
						return $subscription;
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

	public static function newSubscription($user,$plan,$data)
	{
		if (!self::hasAnySubscription($user)) {
			if (!self::hasAlreadySubscribedToPlan($user,$plan)) {
				if ($student = self::IsValid($user)) {
					if ($plan = self::findPlan($plan)) {
						if (PlanSubscription::create($data)) {
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
		}else{
			return false;
		}
	}

	public static function CancelSubscription($user,$plan)
	{
		if ($subscription = self::hasAlreadySubscribedToPlan($user,$plan)) {
			if ($subscription->update(['plan_canceled_at' => date('Y-m-d h:i:s'),'trial_status' => "CANCELLED",'plan_status' => "CANCELLED"])) {
				return $subscription;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	public static function ResumeSubscription($user,$plan)
	{
		if ($subscription = self::hasAlreadySubscribedToPlan($user,$plan)) {
			if ($subscription->update(['plan_canceled_at' => null,'trial_status' => "ACTIVE",'plan_status' => "ACTIVE"])) {
				return $subscription;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}


	public static function IsCanceled($user,$plan)
	{
		if ($subscription = self::hasAlreadySubscribedToPlan($user,$plan)) {
			if ($subscription->plan_status == "CANCELLED") {
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	public static function PlanRemainingDays($user,$plan)
	{
		if ($subscription = self::hasAlreadySubscribedToPlan($user,$plan)) {
			$now = time(); // or your date as well
			$your_date = strtotime($subscription->plan_ends_at);
			$datediff =  $your_date-$now;
			return round($datediff / (60 * 60 * 24));
		}else{
			return false;
		}
	}

	public static function TrialRemainingDays($user,$plan)
	{
		if ($subscription = self::hasAlreadySubscribedToPlan($user,$plan)) {
			$now = time(); // or your date as well
			$your_date = strtotime($subscription->trial_ends_at);
			$datediff =  $your_date-$now;
			return round($datediff / (60 * 60 * 24));
		}else{
			return false;
		}
	}

	public static function PlanFeatures($plan)
	{	    
		if (($find = self::findPlan($plan))) {
			$features = PlanFeature::where('plan_id',$find->id)->first();
			if (!is_null($features)) {
				return $features;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

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

	/*end::For Student*/


	/*begin::For Admin*/
	public static function All()
	{
		return PlanSubscription::withTrashed()->get();
	}

	public static function Count()
	{
		return PlanSubscription::withTrashed()->count();
	}

	public static function Payments()
	{
		return PlanSubscription::withTrashed()->sum('plan_total_charge');
	}

	public static function Delete($subscription)
	{
		$subscription = PlanSubscription::withTrashed()->find($subscription);
		if (!is_null($subscription)) {
			if ($subscription->forceDelete()) {
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
	/*end::For Admin*/
}
