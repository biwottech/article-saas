<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alert extends Model
{
    protected $table = "alerts";

    protected $fillable = [
                            'no_plan_message',
                            'show_no_plan_message',


                            'plan_expiry_message',
                            'show_plan_expiry_message',
                            'plan_expiry_message_before_days',

                            'competetion_won_message',
                            'show_competetion_won_message',
                            'competetion_won_message_for_days',

                            'competetion_loss_message',
                            'show_competetion_loss_message',
                            'competetion_loss_message_for_days',
                            
                            ];
}
