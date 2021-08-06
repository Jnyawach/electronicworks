<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bidding extends Model
{
    use HasFactory;
    protected $fillable=['user_id','project_id', 'amount', 'cost'];

    public  function user(){
        return $this->belongsTo(User::class);
    }

    public  function project(){
        return $this->belongsTo(Project::class);
    }
}
