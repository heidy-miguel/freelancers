<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    public function instructors(){
        return $this->belongsToMany('App\Models\Instructor', 'instructor_skill');
    }

    public function jobs(){
        return $this->belongsToMany('App\Models\Job', 'job_skill');
    }
}
