<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Submission extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;
     protected $fillable=['user_id','project_id','comment','evaluation_id','reason'];

    public  function project(){
        return $this->BelongsTo(Project::class);
    }

}
