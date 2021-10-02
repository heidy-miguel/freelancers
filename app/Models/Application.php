<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'start_date', 'end_date', 'category_id', 
        'description', 'manager_id', 'trainer_id'
    ];

    public function category(){
        return $this->belongsTo('App\Models\Category');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function manager(){
        return $this->belongsTo('App\Models\User');
    }

    public function trainer(){
        return $this->belongsTo('App\Models\User');
    }
}
