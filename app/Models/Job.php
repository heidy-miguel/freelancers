<?php
 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = ['instructor_id'];

    public function skills(){
        return $this->belongsToMany('App\Models\Skill', 'job_skill');
    }

    public function applicants(){
        return $this->belongsToMany('App\Models\Instructor', 'instructor_job');
    }

    public function instructor(){
        return $this->belongsTo('App\Models\Instructor');
    }

    public function trainee(){
        return $this->belongsTo('App\Models\Trainee');
    }
}
