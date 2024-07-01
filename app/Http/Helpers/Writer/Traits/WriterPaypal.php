<?php 
namespace App\Http\Helpers\Writer\Traits;
use App\User;
use App\WriterPaypalAccount;
use Illuminate\Support\Facades\Auth;

trait WriterPaypal
{
	public static function PaypalAccounts($user){
		if ($user = User::find($user)) {
			$accounts = $user->PaypalAccounts;
			if ($accounts->isNotEmpty()) {
				return $accounts;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	public static function FindPaypalAccount($user,$account){
		if ($accounts = self::PaypalAccounts($user)) {
			if ($account = $accounts->find($account)) {
				return $account;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	public static function DeletePaypalAccount($user,$account){
		if ($account = self::FindPaypalAccount($user,$account)) {
			if ($account->delete()) {
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
}
