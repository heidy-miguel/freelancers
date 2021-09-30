<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitation extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo('App\Models\User');
    }  

    public function institution(){
        return $this->belongsTo('App\Models\Institution');
    }

    public function categories(){
        return $this->belongsToMany('App\Models\Category', 'category_solicitation');
    }
}
