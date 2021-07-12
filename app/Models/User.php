<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class User extends Authenticatable implements HasMedia
{
    use HasFactory, Notifiable, InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'last_name',
        'role_id',
        'is_active',
        'cellphone',
       'sec_cellphone',
        'status_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public  function role(){
        return $this->belongsTo(Role::class);
    }

    public  function status(){
        return $this->belongsTo(Status::class);
    }

    public  function detail(){
        return $this->hasOne(WriterDetail::class);
    }

    public  function test(){
        return $this->hasOne(Test::class);
    }

    public  function registerMediaCollections():void
    {
        $this->addMediaCollection('avatar')

            ->registerMediaConversions(function (Media $media){
                $this->addMediaConversion('avatar_card')
                    ->width(1800)
                    ->height(180);
                $this->addMediaConversion('avatar_icon')
                    ->width(80)
                    ->height(80);

            });




    }


}
