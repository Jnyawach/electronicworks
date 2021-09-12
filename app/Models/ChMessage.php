<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChMessage extends Model
{
    //
    public  function user(){
        $this->belongsTo(User::class);
    }
}
