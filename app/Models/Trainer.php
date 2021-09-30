<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class Trainer extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    public function getFullNameAttribute(){
        return "{$this->name} {$this->surname}";
    }

    public function educations(){
        return $this->hasMany('App\Models\Education');
    }

    public function subcategories(){
        return $this->belongsToMany('App\Models\Subcategory', 'subcategory_trainer');
    }

    public function employments(){
        return $this->hasMany('App\Models\Employment');
    }
}
