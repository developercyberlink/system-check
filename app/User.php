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
        'name', 'email', 'password','pin'
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

    // ///////// ######## ////////////
    public function roles(){
        return $this->belongsToMany('App\Models\Members\RoleModel','role_user','user_id','role_id');
    }

    public function adminmenu(){
        return $this->belongsToMany('App\Models\AdminMenu\AdminMenuModel','cl_adminmenu_user','user_id','adminmenu_id');
    }

    public function newstype(){
        return $this->belongsToMany('App\Models\News\NewsTypeModel','cl_newstype_user','user_id','newstype_id');
    }

    public function hasAnyRoles($roles){
        if($this->roles()->whereIn('role',$roles)->first()){
            return true;
        }
        return false;
    }

    public function hasRole($role){
        if($this->roles()->where('role',$role)->first()){
            return true;
        }
        return false;
    }
}
