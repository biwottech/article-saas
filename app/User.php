<?php
namespace App;
use App\Article;
use App\AgeGroup;
use App\ReportArticle;
use App\WriterPaypalAccount;
use App\WriterViewedArticle;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
          "name",
          "email",
          'phone',
          'user_image',
          'place_of_birth',
          "age_group_id",
          "date_of_birth",
          "country",
          "address",
          "mother_name",
          "father_name",
          "parents_consent",
          "school_name",
          "school_phone",
          "school_email",
          "school_address",
          "course",
          "favourite_educator_name",
          "favourite_educator_phone",
          "favourite_educator_email",
          "favourite_educator_address",
          "favourite_institute_name",
          "favourite_institute_phone",
          "favourite_institute_email",
          "favourite_institute_address",
          'role',
          'role_id',
          'type',
          "password",
          "sign_up_ip_address"
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function PayPalAccounts()
    {
        return $this->hasMany(WriterPaypalAccount::class,'user_id');
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }


    public function reports()
    {
        return $this->hasMany(ReportArticle::class);
    }

    public function AgeGroup()
    {
        return $this->belongsTo(AgeGroup::class);
    }

    public function ViewedArticles()
    {
        return $this->hasMany(WriterViewedArticle::class);
    }
}
