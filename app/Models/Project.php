<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Project extends Model implements HasMedia
{
    use HasFactory, Sluggable, InteractsWithMedia;
    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
                 'onUpdate'=> true,
            ]
        ];
    }
    protected $fillable=[
        'title',
        'citation_id',
        'discipline_id',
        'client_id',
        'instruction',
        'writer_id',
        'writer_delivery',
        'client_delivery',
        'words',
        'cost',
    ];

    public function users(){
        return $this->belongsToMany(User::class);
    }


}
