<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'surname',
        'email',
        'password',
        'nif',
        'phone', 
        'address',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function is_admin(){
        $role = $this->role;
        if ($role == 'admin') {
            return true;
            }
        return false;
    }

    public function is_institution(){
      $role = $this->role;
      if($role == 'institution'){
        return true;
      }
      return false;
    }

    public function is_manager(){
      $role = $this->role;
      if($role == 'manager'){
        return true;
      }
      return false;
    }

    public function is_trainer(){
      $role = $this->role;
      if($role == 'trainer'){
        return true;
      }
      return false;
    }

    public function total_apps(){
      return $this->applications()->count();
    }

    public function getFullNameAttribute(){
        return $this->name . ' ' . $this->surname;
  }

    public function scopeAdmin($query)
    {
        return $query->where('role', '=', 'admin')->get();
    }

    public function scopeManager($query)
    {
        return $query->where('role', '=', 'manager')->get();
    }

    public function scopeTrainer($query)
    {
        return $query->where('role', '=', 'trainer')->get();
    }

    public function scopeInstitution($query)
    {
        return $query->where('role', '=', 'institution')->get();
    }

    public function applications(){
        return $this->hasMany('App\Models\Application'); 
    }

    public function subcategories(){
      return $this->belongsToMany('App\Models\Subcategory', 'subcategory_user');
    }

    public function managed_by_me(){
      return $this->hasMany('App\Models\Application', 'manager_id');
    }
}
 