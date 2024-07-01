<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class PlanCountries extends Model
{
    protected $table = "plan_countries";

    protected $fillable = [
    	'country_id',
    	'plan_id',
    ];
}
