<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class WriterPaypalAccount extends Model
{
    protected $table = "student_paypal_accounts";

    protected $fillable = [
		'user_id',
		'account_name',
		'email',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
