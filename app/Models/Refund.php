<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Refund extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable=[
        'project_id',
        'amount',
        'status',
        'reason',
        'reject_reason',
        'user_id',
    ];

    public function project(){
        return$this->belongsTo(Project::class);
    }
}
