<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'trans_code',
        'amount',
        'authorized_by_id',
    ];

    public  function users(){
        return $this->belongsToMany(User::class);
    }
}
