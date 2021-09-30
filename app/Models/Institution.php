<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class Institution extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    protected $guard_name = 'institution';

    public function requests(){
        return $this->hasMany('App\Models\Request');
    }

    public function solicitations(){
        return $this->hasMany('App\Models\Solicitation');
    }
}
