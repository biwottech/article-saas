<?php 
namespace App\Http\Helpers\Admin\Traits\Paypal;
use App\PaypalCredential;
use Illuminate\Support\Facades\Auth;
use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;

trait PaypalSettingsAndOperations
{
    public static function Credentials()
    {        
        if (!is_null($paypal = PaypalCredential::first())) {
            if ($paypal->PAYPAL_MODE === "sandbox") {
                return $paypal;
            }else{
                return $paypal;
            }
        }else{
            //If Nothing Exists then Create with Dummy Data
            if (PaypalCredential::create(['PAYPAL_MODE' => 'sandbox'])) {
                return true;
            }else{
                return false;
            }   
        }
    }

    public static function Mode()
    {        
        if ($paypal = self::Credentials()) {
            return $paypal->PAYPAL_MODE;
        }else{
            return false;
        }
    }

    public static function ModeIsSandbox()
    {        
        if ($paypal = self::Credentials()) {
            if ($paypal->PAYPAL_MODE === "sandbox") {
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public static function ModeIsLive()
    {        
        if ($paypal = self::Credentials()) {
            if ($paypal->PAYPAL_MODE === "live") {
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public static function ClientID()
    {        
        if ($paypal = self::Credentials()) {
            return $paypal->PAYPAL_CLIENT_ID;
        }else{
            return false;
        }
    }

    public static function SecretID()
    {        
        if ($paypal = self::Credentials()) {
            return $paypal->PAYPAL_SECRET_ID;
        }else{
            return false;
        }
    }

    public static function AccountID()
    {        
        if ($paypal = self::Credentials()) {
            return $paypal->PAYPAL_ACCOUNT_ID;
        }else{
            return false;
        }
    }

    public static function Client()
    {        
        if ($paypal = self::Credentials()) {
        $environment = new SandboxEnvironment($paypal->PAYPAL_CLIENT_ID, $paypal->PAYPAL_SECRET_ID);
        return new PayPalHttpClient($environment);
        }else{
            return false;
        }
    }
}
