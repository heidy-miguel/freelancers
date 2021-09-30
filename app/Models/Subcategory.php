<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;

    public function users(){
        return $this->belongsToMany('App\Models\user', 'subcategory_trainer');
    }
}
