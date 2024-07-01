<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WebsiteSetting extends Model
{
    protected $table = "website_settings";

    protected $fillable = [
                            'text_logo',
                            'logo',
                            'address',
                            'email_1',
                            'phone_1',
                            'email_2',
                            'phone_2',
                            'email_3',
                            'phone_3',
                           ];
}
