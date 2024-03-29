<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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

    public function details(){
        return $this->hasOne(UsersDetail::class, 'user_id');
    }

    public function photos(){
        return $this->hasMany(UsersPhoto::class, 'user_id');
    }

    public static function datingProfileExists($user_id){
        $datingCount = UsersDetail::select('user_id', 'status')->where(['user_id' => $user_id, 'status' => 1])->count();
        return $datingCount;
    }

    public static function datingProfileDetails($user_id){
        $datingProfile = UsersDetail::where('user_id', $user_id)->first();
        return $datingProfile;
    }
}
