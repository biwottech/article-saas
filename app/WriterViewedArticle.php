<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WriterViewedArticle extends Model
{
    protected $table = "student_viewed_articles";

    protected $fillable = [
		'user_id',
		'article_id',
    ];

}
