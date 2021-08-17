<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Instructor extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'birth_date', 
        'city', 
        'phone', 
        'rate', 
        'experience', 
        'email',
        'picture',
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

    public function getNameAttribute(){
        return "{$this->first_name} {$this->last_name}";
    }

    public function getFullNameAttribute(){
        return "{$this->first_name} {$this->middle_name} {$this->last_name}";
    }

    public function courses(){
        return $this->belongsToMany('App\Models\Course', 'course_instructor');
    }

    public function skills(){
        return $this->belongsToMany('App\Models\Skill', 'instructor_skill');
    }

    public function trainings(){
        return $this->hasMany('App\Models\Training');
    }

    public function educations(){
        return $this->hasMany('App\Models\Education');
    }

    public function employments(){
        return $this->hasMany('App\Models\Employment');
    }

    public function languages(){
        return $this->belongsToMany('App\Models\Language', 'instructor_language');
    }


}
