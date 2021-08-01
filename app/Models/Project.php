<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Project extends Model implements HasMedia
{
    use HasFactory, Sluggable, InteractsWithMedia,SluggableScopeHelpers;
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
        'descipline_id',
        'client_id',
        'instruction',
        'writer_id',
        'writer_delivery',
        'client_delivery',
        'words',
        'cost',
        'progress_id',
        'status',
        'sku'
    ];

    public  function writers(){
        return $this->belongsTo(User::class, 'writer_id');
    }
    public  function citation(){
        return $this->belongsTo(Citation::class);
    }
    public  function descipline(){
        return $this->belongsTo(Descipline::class);
    }

    public  function clients(){
        return $this->belongsTo(User::class,'client_id');
    }

    public  function progress(){
        return $this->belongsTo(Progress::class);
    }

    public  function bids(){
        return $this->hasMany(Bidding::class);
    }

    public  function order(){
        return $this->hasOne(Order::class);
    }

    public  function submission(){
        return $this->hasOne(Submission::class);
    }

    public  function revision(){
        return $this->hasOne(Submission::class);
    }

}
