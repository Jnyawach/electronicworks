<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class WriterDetail extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasFactory;

    protected $fillable=[
        'gender',
        'language',
        'night_calls',
        'country',
        'city',
        'zip',
        'university',
        'department',
        'course',
        'graduation',
        'score',
        'user_id'

    ];

    public function users(){
        return $this->belongsTo(User::class);
    }
}
