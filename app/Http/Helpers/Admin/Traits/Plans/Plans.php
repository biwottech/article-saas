<?php 
namespace App\Http\Helpers\Admin\Traits\Plans;

use App\Plan;
use App\Countries;
use App\PlanFeature;
use App\PlanCountries;
use Illuminate\Support\Facades\Auth;

trait Plans
{
	public static function All()
	{
		if (!($plans = Plan::withTrashed()->get())->isEmpty()) {
			return $plans;
		}else{
			return false;
		}
	}

	public static function CountAll()
	{
		return Plan::withTrashed()->count();
	}

	public static function CountActive()
	{
		return Plan::all()->count();
	}

	public static function CountDeactive()
	{
		return Plan::onlyTrashed()->count();
	}

	public static function Create($request,$data)
	{
	    $request->validate([
	        'name' => 'required|string|max:150',
	        'description' => 'nullable|string|max:32768',
	        'price' => 'required|numeric',
	        'signup_fee' => 'required|numeric',
	        'invoice_period' => 'sometimes|integer|max:100000',
	        'trial_period' => 'sometimes|integer|max:100000',
	        'grace_period' => 'sometimes|integer|max:100000',
	    ]);
		if ($plan = Plan::create($data)) {
			return $plan;
		}else{
			return false;
		}
	}

	public static function Read($plan)
	{	    
		if (!is_null($find = Plan::withTrashed()->find($plan))) {
			return $find;
		}else{
			return false;
		}
	}

	public static function Update($request,$plan,$data)
	{
		if (!is_null($find = Plan::withTrashed()->find($plan))) {
		    $request->validate([
		        'name' => 'required|string|max:150',
		        'description' => 'nullable|string|max:32768',
		        'price' => 'required|numeric',
		        'signup_fee' => 'required|numeric',
		        'invoice_period' => 'sometimes|integer|max:100000',
		        'trial_period' => 'sometimes|integer|max:100000',
		    ]);
		if ($update = $find->update($data)) {
				return $update;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	public static function Delete($plan)
	{	    
		if (!is_null($find = Plan::withTrashed()->find($plan))) {
			if ($find->forceDelete()) {
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	public static function IsActive($plan)
	{	    
		if ($find = self::Read($plan)) {
			if ($find->trashed()) {
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	public static function Deactive($plan)
	{	    
		if (!is_null($find = Plan::find($plan))) {
			if ($find->delete()) {
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	public static function Activate($plan)
	{	    
		if (!is_null($find = Plan::withTrashed()->find($plan))) {
			if ($find->restore()) {
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	public static function Features($plan)
	{	    
		if (!is_null($find = Plan::withTrashed()->find($plan))) {
			$features = PlanFeature::withTrashed()->where('plan_id',$find->id)->first();
			if (!is_null($features)) {
				return $features;
			}else{
				if ($features = PlanFeature::create(['plan_id' => $find->id])) {
					return $features;
				}else{
					return false;
				}
			}
		}else{
			return false;
		}
	}

	public static function AddedCountries($plan)
	{
		if ($plan = self::Read($plan)) {
			$list = PlanCountries::where('plan_id',$plan->id)
					     ->get();
			if (!($list)->isEmpty()) {
			return Countries::find($list->pluck('country_id')->unique()->toArray());
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	public static function CountAddedCountries($plan)
	{
		if ($plan = self::Read($plan)) {
			$list = PlanCountries::where('plan_id',$plan->id)
					     ->get();
			if (!($list)->isEmpty()) {
			return Countries::find($list->pluck('country_id'))->count();
			}else{
				return 0;
			}
		}else{
			return 0;
		}
	}

	public static function CountryAlreadyAdded($plan,$country)
	{
		if ($plan = self::Read($plan)) {
			$country = PlanCountries::where('country_id',$country)
						 ->where('plan_id',$plan->id)
					     ->first();
			if (!is_null($country)) {
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

                                               
	public static function AddCountryTo($plan,$country)
	{
		if ($plan = self::Read($plan)) {
			if (self::CountryAlreadyAdded($plan->id,$country)) {
				return false;
			}else{
				if (PlanCountries::create(['country_id' => $country,'plan_id' => $plan->id,])) {
					return true;
				}else{
					return false;
				}
			}
		}else{
			return false;
		}
	}
	public static function RemoveCountryFrom($plan,$country)
	{
		if ($plan = self::Read($plan)) {
			if (self::CountryAlreadyAdded($plan->id,$country)) {
				if ($find = PlanCountries::where('plan_id',$plan->id)
							->where('country_id',$country)
							->first()) {
					if ($find->forceDelete()) {
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
}
