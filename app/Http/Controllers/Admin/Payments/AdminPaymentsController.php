<?php

namespace App\Http\Controllers\Admin\Payments;

use App\PlanSubscription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Helpers\Subscription\Subscription;

class AdminPaymentsController extends Controller
{
    public function __construct()
    {
        return $this->middleware(['auth','admin']);
    }

    public function Payments()
    {
        return view('Admin.Dashboard.Payments.index');
    }

    public function PayIn()
    {
        $subscriptions = new PlanSubscription;
        $paginate = 5;
        $columns = ['plan_status'];
        $queries = [];

        if (request('search')) {
            $subscriptions = $subscriptions->where('name','LIKE','%'.request('search').'%')
            ->orWhere('description','LIKE','%'.request('search').'%')
            ->orWhere('plan_signup_fee','LIKE','%'.request('search').'%')
            ->orWhere('plan_price','LIKE','%'.request('search').'%')
            ->orWhere('plan_total_charge','LIKE','%'.request('search').'%')
            ->orWhere('plan_status','LIKE','%'.request('search').'%');
            $queries['search'] = request('search');
        }

        if (request('show')) {
            $paginate = intval(request('show'));
            $queries['show'] = request('show');
        }
        foreach ($columns as $column) {
            if (request($column)){
                $subscriptions = $subscriptions->where($column,strtoupper(request($column)));
                $queries[$column] = request($column);
            }
        }
        $subscriptions = $subscriptions->paginate($paginate)->appends($queries);
        return view('Admin.Dashboard.Payments.PayIn.index',compact('subscriptions'));
    }

    public function PayOut()
    {
        return view('Admin.Dashboard.Payments.PayOut.index');
    }

    public function DeleteSubscription($id)
    {
        if (Subscription::Delete($id)) {
            return back()->with('success','Deleted Successfully!');
        }else{
            return back()->with('error','Something Went Wrong!');
        }
    }
}
