<?php

namespace App;

use App\Http\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Transaction extends Model
{
    use Notifiable, Uuids;
    public function user(){
        return $this->hasOne('App\User','id','user_id');
    }
}
