<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\AdminResetPasswordNotification;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;


class Admin extends Authenticatable
{
use HasRoles;
use HasFactory ;

    protected $table = 'admins';

    protected $fillable = ['first_name', 'last_name', 'email', 'phone', 'image', 'password'];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new AdminResetPasswordNotification($token));
    }

    public function getFirstNameAttribute($val){
        return ucfirst($val);
    }
    public function getLastNameAttribute($val){
        return ucfirst($val);
    }
}
