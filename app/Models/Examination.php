<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Examination extends Model
{
    use HasFactory;
    protected $fillable=[
        'quiz',
        'choice_a',
        'choice_b',
        'choice_c',
        'answer',
        'category_id'

    ];

    public  function category(){
        return $this->belongsTo(ExamCategory::class);
    }
}
