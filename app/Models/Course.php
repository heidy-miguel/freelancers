<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public function category(){
        return $this->belongsTo('App\Models\CourseCategory');
    }

    public function instructors(){
        return $this->belongsToMany('App\Models\Instructor', 'course_instructor');
    }

    public function trainings(){
        return $this->hasMany('App\Models\Training');
    }
}
