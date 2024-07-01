<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WriterReadArticle extends Model
{
    protected $table = "student_read_articles";

    protected $fillable = [
    	'competetions_id',
		'user_id',
		'article_id',
    ];
}
