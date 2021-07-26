<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Descipline extends Model
{
    use HasFactory;

    protected $fillable=['status','name','price'];

    public  function  projects(){
        return $this->hasMany(Project::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'descipline_user');
    }


}
