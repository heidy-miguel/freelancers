<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable. 
     *
     * @var array
     */
    protected $fillable = [
        'active',
        'first_name',
        'middle_name',
        'last_name',
        'phone',
        'birth_date',
        'bio',
        'code',
        'email',
        'password',
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

    protected $guard_name = 'web';

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function scopeManagers($query)
    {
        return $this->role('manager');
    }

    public function getFullNameAttribute(){
        return "{$this->name} {$this->surname}";
    }

    public function solicitations(){
        return $this->hasMany('App\Models\Solicitation');
    }
}
