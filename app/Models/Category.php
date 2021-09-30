<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function solicitations(){
        return $this->belongsToMany('App\Models\Solicitation', 'category_solicitation');
    }
}
