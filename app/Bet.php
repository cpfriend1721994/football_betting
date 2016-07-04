<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bet extends Model
{
    //
    protected $table='bets';
    protected $fillable = array('user_id','match_id','money','choose');
}
