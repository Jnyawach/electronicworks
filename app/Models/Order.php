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
        'client_id',
        'invoice_id',
        'cost'
    ];
    public  function project(){
        return $this->belongsTo(Project::class);
    }

    public  function invoice(){
        return $this->belongsTo(Invoice::class);
    }
}
