<?php
namespace App;
use App\User;
use App\ReportArticle;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Codebyray\ReviewRateable\Contracts\ReviewRateable;
use Codebyray\ReviewRateable\Traits\ReviewRateable as ReviewRateableTrait;

class Article extends Model implements ReviewRateable
{
	use SoftDeletes,ReviewRateableTrait;
	
    protected $table = "articles";

    protected $fillable = [
                            'user_id',
                            'plan_id',
                            'views',
                            'status',
                            'visibility',
                            'title',
                            'content',
                            'feature_image',
                            ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reports()
    {
        return $this->hasMany(ReportArticle::class);
    }


    public function ViewedByUsers()
    {
        return $this->belongsToMany(User::class,'article_user');
    }
}
