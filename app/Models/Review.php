<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'project_id',
        'writer_id',
        'stars',
        'comment'
    ];

    public function project(){
        return$this->belongsTo(Project::class);
    }
    public  function writers(){
        return $this->belongsTo(User::class, 'writer_id');
    }
    public  function clients(){
        return $this->belongsTo(User::class,'user_id');
    }
}
