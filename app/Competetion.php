<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Competetion extends Model
{
    protected $table = "competetions";
    
    protected $fillable = [
    	'name',
    	'status',
		'starting_date',
		'ending_date',
		'description',
		'guide_lines',
		'ended_at',
		'result_status',
		'result_visibility',
		'result_description',
		'result_announcing_date',
    ];

}
