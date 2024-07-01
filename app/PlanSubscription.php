<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlanSubscription extends Model
{
    use SoftDeletes;

    protected $table = "plan_subscriptions";

    protected $fillable = [
        'user_id',
        'plan_id',
        'Order_ID',
        'Order_Status',
        'Payer_Given_Name',
        'Payer_Sur_Name',
        'Payer_Email',
        'Payer_ID',
        'name',
        'description',
        'trial_ends_at',
        'trial_status',
        'plan_starts_at',
        'plan_ends_at',
        'plan_status',
        'plan_signup_fee',
        'plan_price',
        'plan_total_charge',
        'Paid_At',
        'plan_canceled_at',
    ];
}
