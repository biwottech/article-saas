<?php

namespace App;
use Carbon\Carbon;
use App\PlanSubscriptionUsage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlanFeature extends Model
{
    use SoftDeletes;

    protected $table = "plan_features";

    protected $fillable = [
        'plan_id',
        'competetion_quantity',
        'writing_quantity',
        'reading_quantity',
        'submit_quantity',
        'rating_quantity',
        'can_update_after_joined',
    ];

    public function usage()
    {
        return $this->hasMany(PlanSubscriptionUsage::class,'feature_id', 'id');
    }
}
