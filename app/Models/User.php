<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Traits\UserNamable;
use App\Models\Traits\UserNameRoutable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable; use UserNamable; use UserNameRoutable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','droit_id'
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

    /**
     * Check admin role
     *
     * @return bool
     */
    public function isAdmin()
    {
        return $this->role->droit_user=="admin";
    }

    /**
     * Check not user role
     *
     * @return bool
     */
    public function isNotUser()
    {
        return $this->role->slug != 'user';
    }

    public function photo_profils()
    {
        return $this->hasOne('App\Models\PhotoProfil', 'user_id','id');
    }

    public function droit()
    {
        return $this->belongsTo(Droit::class);
    }
    public function messagerie()
    {
        return $this->hasMany('App\Models\Messagerie','use_id','id');
    }
    public function etudiants()
    {
        return $this->hasOne('App\Models\EtudiantStory','user_id','id');
    }
    public function avis()
    {
        return $this->hasMany('App\Models\Avi','user_id','id');
    }
}
