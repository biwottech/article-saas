<?php

namespace App\Http\Controllers\Admin\PlansPricing;

use App\Countries;
use App\PlanFeature;
use App\Plan as PlanModel;
use Illuminate\Http\Request;
use App\Http\Helpers\Admin\Plan;
use App\Http\Controllers\Controller;

class PlansPricingController extends Controller
{
    public function __construct()
    {
        return $this->middleware(['auth','admin']);
    }

    public function AllPlans()
    {  
        $plans = PlanModel::withTrashed()->paginate(5); 
        return view('Admin.Dashboard.PlansPricing.index',compact('plans'));
    }

	public function CreatePlan(Request $request)
	{
        return view('Admin.Dashboard.PlansPricing.Create.index');
	}

    public function SavePlan(Request $request)
    {   
        $data = [
        'name' => $request->name,
        'description' => $request->description,
        'price' => $request->price,
        'signup_fee' => $request->signup_fee,
        'invoice_period' => $request->invoice_period,
        'invoice_interval' => 'month',
        'trial_period' => $request->trial_period,
        'trial_interval' => 'day',
        'grace_period' => $request->grace_period,
        'grace_interval' => 'day',
        ];

        if (Plan::Create($request,$data)) {
            return redirect()->route('AdminPlansPricing')->with('success','Plan Created Successfully');
        }else{
            return redirect()->route('AdminPlansPricing')->with('error','Something Went Wrong!');
        }
    }

    public function EditPlan(Request $request,$id)
    {
        if ($plan = Plan::Read($id)) {
            return view('Admin.Dashboard.PlansPricing.Update.index',compact('plan'));
        }else{
            return redirect()->route('AdminPlansPricing')->with('error','Plan not found!');
        }
    }

    public function UpdatePlan(Request $request,$id)
    {
        if ($request->is_active == 1) {
            $active = 1;
        }else{
            $active = 0;
        }
        $data = [
        'name' => $request->name,
        'description' => $request->description,
        'is_active' => $active,
        'price' => $request->price,
        'signup_fee' => $request->signup_fee,
        'invoice_period' => $request->invoice_period,
        'invoice_interval' => 'month',
        'trial_period' => $request->trial_period,
        'trial_interval' => 'day',
        'currency' => 'USD',
        ];
        if (Plan::Update($request,$id,$data)) {
            return redirect()->route('AdminPlansPricing')->with('success','Plan Updated Successfully');
        }else{
            return redirect()->route('AdminPlansPricing')->with('error','Something Went Wrong!');
        } 
    }

    public function ActivatePlan($id)
    {
        if (Plan::Activate($id)) {
            return redirect()->route('AdminPlansPricing')->with('success','Plan Actived Successfully');
        }else{
            return redirect()->route('AdminPlansPricing')->with('error','Something Went Wrong!');
        } 
    }

    public function DeactivatePlan($id)
    {
        if (Plan::Deactive($id)) {
            return redirect()->route('AdminPlansPricing')->with('success','Plan Deactived Successfully');
        }else{
            return redirect()->route('AdminPlansPricing')->with('error','Something Went Wrong!');
        } 
    }

    public function DeletePlan($id)
    {
        if (Plan::Delete($id)) {
            return redirect()->route('AdminPlansPricing')->with('success','Plan Deleted Successfully');
        }else{
            return redirect()->route('AdminPlansPricing')->with('error','Something Went Wrong!');
        } 
    }

    public function PlanCountries($id)
    {
        if ($plan = Plan::Read($id)) {
            $countries = Countries::all();
            return view('Admin.Dashboard.PlansPricing.Countries.index')
                   ->with([
                        'countries' => $countries,
                        'plan' => $plan,
                     ]);
        }else{
            return redirect()->route('AdminPlansPricing')->with('error','Plan not found!');
        }
    }

    public function AddPlanCountries($plan,$country)
    {
        if ($plan = Plan::Read($plan)) {
            $country = Countries::findOrFail($country);
            if (Plan::AddCountryTo($plan->id,$country->id)) {
                return back()->with('success','Country Added Successfully');
            }else{
                return back()->with('error','Something Went Wrong');   
            }
        }else{
            return back()->with('error','Plan not found!');
        }
    }

    public function RemovePlanCountries($plan,$country)
    {
        if ($plan = Plan::Read($plan)) {
            $country = Countries::findOrFail($country);
            if (Plan::RemoveCountryFrom($plan->id,$country->id)) {
                return back()->with('success','Country Removed Successfully');
            }else{
                return back()->with('error','Something Went Wrong');   
            }
        }else{
            return back()->with('error','Plan not found!');
        }
    }

    public function EditFeatures ($plan)
    {
        if ($plan = Plan::Read($plan)) {
            $features = Plan::Features($plan->id);
            return view('Admin.Dashboard.PlansPricing.Features.index')
                   ->with([
                        'plan' => $plan,
                        'features' => $features,
                   ]);
        }else{
            return back()->with('error','Plan not found!');
        }
    }

    public function UpdateFeatures(Request $request,$feature)
    {
            $feature = PlanFeature::withTrashed()->findOrFail($feature);
            $request->validate([
                'competetion_quantity' => 'required|numeric',
                'writing_quantity' => 'required|numeric',
                'reading_quantity' => 'required|numeric',
                'submit_quantity' => 'required|numeric',
                'rating_quantity' => 'required|numeric',
                'can_update_after_joined' => 'nullable|string|in:true,false',
            ]);
            $data = [
                'competetion_quantity' => $request->competetion_quantity,
                'writing_quantity' => $request->writing_quantity,
                'reading_quantity' => $request->reading_quantity,
                'submit_quantity' => $request->submit_quantity,
                'rating_quantity' => $request->rating_quantity,
                'can_update_after_joined' => $request->can_update_after_joined,
            ];
            if ($feature->update($data)) {
                return back()->with('success','Features Updated Successfully!');
            }else{
                return back()->with('error','Something Went Wrong!');
            }
    }
}
