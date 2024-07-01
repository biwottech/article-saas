<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class CompetetionData extends Model
{
    protected $table = "competetion_data";

    protected $fillable = ['competetions_id','user_id','subscription_id','article_id'];
}
