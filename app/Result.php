<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $table = "results";

    protected $fillable = [

    	'competetions_id',
    	'user_id',
    	'article_id',
    	'age_group_id',
    	'position',
    	'prize',
    	'claim_prize',

    ];
}
