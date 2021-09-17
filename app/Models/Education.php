<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    public function instructor(){
        return $this->belongsTo('App\Models\Instructor');
    }

    public function certificates(){
        return $this->hasMany('App\Models\Certificate');
    }
}
