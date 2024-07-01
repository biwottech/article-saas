<?php

namespace App\Http\Controllers\Writer;

use App\Plan;
use PayPalHttp\IOException;
use Illuminate\Http\Request;
use PayPalHttp\HttpException;
use App\Http\Helpers\Admin\Paypal;
use App\Http\Helpers\Writer\Writer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use PaypalPayoutsSDK\Payouts\PayoutsGetRequest;
use PaypalPayoutsSDK\Payouts\PayoutsPostRequest;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;
use PayPalCheckoutSdk\Orders\OrdersCaptureRequest;

class WriterPlansPricingController extends Controller
{
    public function PlansPricing()
    {
        $plans = Plan::all();
        return view('Writer.Dashboard.PlansPricing.index',compact('plans'));
    }

    public function ChoosePlan($plan)
    {
        if ($plan = Writer::findPlanWithPriceId($plan)) {
            return view('Writer.Dashboard.Subscriptions.Subscribe.index')
                   ->with([
                    'plan' => $plan,
                   ]);
        }else{
           return back()->with('error','Something Went Wrong!'); 
        }
    }

    public function PayNow(Request $request,$plan)
    {
        if ($plan = Writer::findPlanWithPriceId($plan)) {
            $value = $plan->price+$plan->signup_fee;
            if ($paypal = Paypal::Credentials()) {
            $request = new OrdersCreateRequest();
            $request->prefer('return=representation');
            $request->body = [
                                "intent" => "CAPTURE",
                                "purchase_units" => [[
                                    "reference_id" => "Purchase a Card",
                                    "amount" => [
                                         "value" => "$value",
                                         "currency_code" => "USD"
                                    ]
                                ]],
                                "application_context" => [
                                    "cancel_url" => route('WriterOrderCancel'),
                                    "return_url" => route('WriterOrderSuccessful',$plan->price_id),
                                ] 
                             ];
                try {
                    $response = Paypal::Client()->execute($request);
                    return redirect($response->result->links[1]->href);
                }catch (HttpException $ex) {
                    return back()
                        ->with('error',"Something Went Wrong!Try again Later");;
                }catch(IOException $ex) {
                return redirect()
                       ->route('WriterPlansPricing')
                       ->with('error',"Something Went Wrong!Try again Later");
                }
            }else{
                return redirect()
                       ->route('WriterPlansPricing')
                       ->with('error','Something Went Wrong!Try again Later');
            }
        }else{
           return back()->with('error','Something Went Wrong!'); 
        }
    }


    public function OrderSuccessful(Request $request,$plan)
    {
        if ($plan = Writer::findPlanWithPriceId($plan)) {
            if ($paypal = Paypal::Credentials()) {
            $request = new OrdersCaptureRequest($request->token);
            $request->prefer('return=representation');
            try {
                $response = Paypal::Client()->execute($request);
                $order_details = $response->result;

                $trial_ends_at = date('Y-m-d h:i:s', strtotime("+".$plan->trial_period." day", strtotime(date('Y-m-d h:i:s'))));

                $plan_ends_at = date('Y-m-d h:i:s', strtotime("+".$plan->grace_period." day", strtotime(date('Y-m-d h:i:s A'))));

                $data = [
                    'user_id' => Auth::user()->id,
                    'Order_ID' => $order_details->id,
                    'Order_Status' => $order_details->status,
                    'Payer_Given_Name' => $order_details->payer->name->given_name,
                    'Payer_Sur_Name' => $order_details->payer->name->surname,
                    'Payer_Email' => $order_details->payer->email_address,
                    'Payer_ID' => $order_details->payer->payer_id,
                    'Paid_Amount' => $order_details->purchase_units[0]->amount->value,
                    'Paid_At' => date('Y-m-d'),
                    'plan_id' => $plan->id,
                    'name' => $plan->name,
                    'description' => $plan->description,
                    'trial_ends_at' => $trial_ends_at,
                    'trial_status' => "ACTIVE",
                    'plan_starts_at' => date('Y-m-d h:i:s'),
                    'plan_ends_at' => $plan_ends_at,
                    'plan_status' => "ACTIVE",
                    'plan_signup_fee' => $plan->signup_fee,
                    'plan_price' => $plan->price,
                    'plan_total_charge' => $plan->signup_fee+$plan->price, 
                ];
                if (Writer::newSubscription(Auth::user()->id,$plan,$data)) {
                    return redirect()
                           ->route('WriterPlansPricing')
                           ->with('success',"Subscribed Successfully!");
                }else{
                    return redirect()
                           ->route('WriterPlansPricing')
                           ->with('error',"Something Went Wrong!Try again Later");  
                }
                }catch(HttpException $ex) {
                    return redirect()
                           ->route('WriterPlansPricing')
                           ->with('error',"Something Went Wrong!Try again Later");
                }catch(IOException $ex) {
                    return redirect()
                           ->route('WriterPlansPricing')
                           ->with('error',"Something Went Wrong!Try again Later");
                }
            }else{
                return redirect()
                           ->route('WriterPlansPricing')
                           ->with('error',"Something Went Wrong!Try again Later");
            }
        }else{
            return back()->with('error','Something Went Wrong!'); 
        }
    }

    public function OrderCancel(Request $request)
    {
        return redirect()
               ->route('WriterPlansPricing')
               ->with('error','The Order was Cancelled!');
    }

    public function Subscriptions()
    {
        $subscriptions = Writer::Subscriptions(Auth::user()->id);
        return view('Writer.Dashboard.Subscriptions.index',compact('subscriptions'));
    }

    public function CancelPlan($plan)
    {
        $plan = Plan::findOrFail($plan);
        if (Writer::CancelSubscription(Auth::user()->id,$plan->id)) {
           return back()->with('success','Canceled Successfully!');
        }else{
            return back()->with('error','Something Went Wrong!');
        }
    }

    public function ResumePlan($plan)
    {
        $plan = Plan::findOrFail($plan);
        if (Writer::ResumeSubscription(Auth::user()->id,$plan->id)) {
           return back()->with('success','Successfully Resumed!');
        }else{
            return back()->with('error','Something Went Wrong!');
        }
    }

    public function FreePlan($plan)
    {
        if ($find = Writer::findPlanWithPriceId($plan)) {

            $trial_ends_at = date('Y-m-d h:i:s', strtotime("+".$find->trial_period." day", strtotime(date('Y-m-d h:i:s'))));

            $plan_ends_at = date('Y-m-d h:i:s', strtotime("+".$find->grace_period." day", strtotime(date('Y-m-d h:i:s A'))));
                    $data = [
                        'user_id' => Auth::user()->id,
                        'Order_Status' => "SUCCESS",
                        'Payer_Given_Name' => Auth::user()->name,
                        'Payer_Sur_Name' => Auth::user()->name,
                        'Payer_Email' => Auth::user()->email,
                        'Paid_Amount' => $find->signup_fee+$find->price,
                        'Paid_At' => date('Y-m-d'),
                        'plan_id' => $find->id,
                        'name' => $find->name,
                        'description' => $find->description,
                        'trial_ends_at' => $trial_ends_at,
                        'trial_status' => "ACTIVE",
                        'plan_starts_at' => date('Y-m-d h:i:s'),
                        'plan_ends_at' => $plan_ends_at,
                        'plan_status' => "ACTIVE",
                        'plan_signup_fee' => $find->signup_fee,
                        'plan_price' => $find->price,
                        'plan_total_charge' => $find->signup_fee+$find->price, 
                    ];
                    
                if (Writer::newSubscription(Auth::user()->id,$find,$data)) {
                    return redirect()
                           ->route('WriterPlansPricing')
                           ->with('success',"Subscribed Successfully!");
                }else{
                    return redirect()
                           ->route('WriterPlansPricing')
                           ->with('error',"Something Went Wrong!Try again Later");  
                } 
        }else{
            return back()->with('error','Something Went Wrong!');
        }
    } 
}
