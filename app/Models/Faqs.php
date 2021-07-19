<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faqs extends Model
{
    use HasFactory;
    protected $fillable=[
        'faq_category_id',
        'answer',
        'question',
        'status',
    ];

    public  function faq_category(){
        return $this->belongsTo(FaqCategory::class);
    }


}
