<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id',
        'project_id',
        'project_sku',
        'amount',
        'refund',
    ];
    public  function project(){
        return $this->belongsTo(Project::class);
    }
}
