<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EssayWriting extends Model
{
    use HasFactory;
    protected $fillable=[
        'essay_body',
        'essay_id',
        'user_id',
    ];

    public  function  user(){
        return $this->belongsTo(ExamCategory::class);
    }


}
