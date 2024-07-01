<?php
namespace App;
use App\PlanFeature;
use App\PlanSubscription;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plan extends Model
{
    use SoftDeletes;
    protected $table = "plans";
    protected $fillable = [
        'name',
        'description',
        'price',
        'price_id',
        'signup_fee',
        'trial_period',
        'trial_interval',
        'invoice_period',
        'invoice_interval',
        'grace_period',
        'grace_interval',
    ];
}
