<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    //
    protected $table='matches';
    protected $fillable = array('id','home_team', 'guest_team','permision','status', 'home_ratio','guest_ratio','tie_ratio','start_time', 'end_time','bet_time', 'home_score', 'guest_score');
}
