<?php
namespace App\Http\Controllers\Admin\Paypal;

use Illuminate\Http\Request;
use App\Http\Helpers\Admin\Paypal;
use App\Http\Controllers\Controller;

class PaypalController extends Controller
{
    public function PaypalSettings()
    {
    	$secret_id = Paypal::SecretID();
    	$client_id = Paypal::ClientID();
    	$account_id = Paypal::AccountID();
    	return view('Admin.Dashboard.Settings.Paypal.index')
    		   ->with([
    		   	'secret_id' => $secret_id,
    		   	'client_id' => $client_id,
    		   	'account_id' => $account_id,
    		    ]);
    }

	public function SavePaypalSettings(Request $request)
	{
		$rules = [
			'paypal_mode.in' => 'Please Select Sandbox OR Live Mode',
		];

		$request->validate([
			'paypal_mode' => 'required|string|in:live,sandbox',
			'client_id' => 'required|string',
			'secret_id' => 'required|string',
			'account_id' => 'required|string',
		],$rules);

		$data = [
			'PAYPAL_MODE' => $request->paypal_mode,
			'PAYPAL_CLIENT_ID' => $request->client_id, 
			'PAYPAL_SECRET_ID' => $request->secret_id, 
			'PAYPAL_ACCOUNT_ID' => $request->account_id, 
		];
		if (Paypal::Credentials()->update($data)) {
			return back()->with('success','Updated Successfully');
		}else{
			return back()->with('error','Something Went Wrong!');
		}
	}
}
