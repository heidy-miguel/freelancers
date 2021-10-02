<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function subcategories(){
        return $this->hasMany('App\Models\Subcategory');
    }

    public function applications(){
        return $this->hasMany('App\Models\Application');
    }
}
