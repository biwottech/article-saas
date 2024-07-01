<?php 
namespace App\Http\Helpers\Paypal\Traits;
use App\PaypalCredential;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;

trait Paypal

{
    public static function Demo()
    {
        return "hello";
    }
}
