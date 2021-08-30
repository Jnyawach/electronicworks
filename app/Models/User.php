<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Bavix\Wallet\Traits\HasWallet;
use Bavix\Wallet\Interfaces\Wallet;
use Bavix\Wallet\Traits\HasWalletFloat;
use Bavix\Wallet\Interfaces\WalletFloat;
use Bavix\Wallet\Traits\HasWallets;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;



class User extends Authenticatable implements HasMedia,Wallet, WalletFloat
{
    use HasFactory, Notifiable, InteractsWithMedia,HasWallet,HasWalletFloat, HasWallets,
        HasRoles;

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
        'is_active',
        'cellphone',
       'sec_cellphone',
        'level_id'
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

//    public  function role(){
//        return $this->belongsTo(Role::class);
//    }

    public  function status(){
        return $this->belongsTo(Status::class);
    }

    public  function detail(){
        return $this->hasOne(WriterDetail::class);
    }

    public  function test(){
        return $this->hasOne(Test::class);
    }
    public  function essay(){
        return $this->hasOne(EssayWriting::class);
    }

    public function projects(){
        return $this->hasMany(Project::class, 'client_id');
    }
    public  function jobs(){
        return $this->hasMany(Project::class, 'writer_id');
    }


    public function payment(){
        return $this->hasMany(Payment::class);
    }
    public function withdrawal(){
        return $this->hasMany(Withdraw::class);
    }
    public function refunds(){
        return $this->hasMany(Refund::class);
    }
    public function desciplines()
    {
        return $this->belongsToMany(Descipline::class, 'descipline_user');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class,'user_id');
    }

    public function reviewing()
    {
        return $this->hasMany(Review::class,'writer_id');
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }




    public  function registerMediaCollections():void
    {
        $this->addMediaCollection('avatar')

            ->registerMediaConversions(function (Media $media){
                $this->addMediaConversion('avatar_card')
                    ->width(180)
                    ->height(180);
                $this->addMediaConversion('avatar_icon')
                    ->width(80)
                    ->height(80);

            });




    }



}
