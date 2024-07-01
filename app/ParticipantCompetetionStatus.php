<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParticipantCompetetionStatus extends Model
{
    protected $table = "participant_competetion_status";

    protected $fillable = ['competetions_id','user_id','status'];
}
