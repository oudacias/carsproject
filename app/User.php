<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom','prenom', 'email','telephone','role','objectif', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function forums()
    {
        return $this->belongsToMany('App\Forum','user_forum')->withPivot('id','commentaire');
    }
    public function boutique()
    {
        return $this->hasMany('App\Boutique','user_id');
    }
    public function Userimage(){
        return $this->hasOne('App\Userimage');
    }
    public function achatvoiture(){
        return $this->hasMany('App\Achatvoiture','user_id');
    }
    public function forum()
    {
        return $this->hasMany('App\Forum','user_id');
    }
    public function articles()
    {
        return $this->belongsToMany('App\Article','user_article')->withPivot('id');
    }
    public function voiture()
    {
        return $this->hasMany('App\Voiture','user_id');
    }
    public function notificationforum()
    {
        return $this->hasMany('App\Notificationforum','user_id')->where('vu','=', false);
    }
    public function notificationadminservice()
    {
        return $this->hasMany('App\Notificationadmin','admin_id')->where('vu','=', false)->where('type_notification','=','service');
    }
    public function notificationadminuser()
    {
        return $this->hasMany('App\Notificationadmin','admin_id')->where('vu','=', false)->whereIn('type_notification',['fournisseur','particulier']);
    }

}
