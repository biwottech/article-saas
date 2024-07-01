<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class PaypalCredential extends Model
{
	protected $table = "paypal_credentials";

    protected $fillable = [

    	'PAYPAL_MODE',
		'PAYPAL_CLIENT_ID',
		'PAYPAL_SECRET_ID',
		'PAYPAL_ACCOUNT_ID',
		];


}
