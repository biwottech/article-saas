<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompetetionSetting extends Model
{
    protected $table = "competetion_settings";

    protected $fillable = [
                            'competetions_id',
                            'reading_quantity',
                            'submit_quantity',
                            'rating_quantity',
                            'can_submit_after_initializing',
                            'can_submit_after_started',
                            'can_submit_after_paused',
                            'can_submit_after_ended',
                            'can_update_after_joined',
                          ];
}
