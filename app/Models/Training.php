<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'start_date',
        'state',
        'end_date',
        'address',
        'price', 
        'trainee_id', 
        'instructor_id', 
        'course_id', 
    ];

    public function instructor(){
        return $this->belongsTo('App\Models\Instructor');
    }

    public function trainee(){
        return $this->belongsTo('App\Models\Trainee');
    }

    public function course(){
        return $this->belongsTo('App\Models\Course');
    }

}
