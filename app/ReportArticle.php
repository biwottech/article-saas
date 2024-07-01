<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\User\User;

class ReportArticle extends Model
{
    protected $table = "article_reports";

    protected $fillable = [

    	'user_id',
    	'article_id',
    	'report',
    	'report_message',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
