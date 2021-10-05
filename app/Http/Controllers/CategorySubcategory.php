<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategorySubcategory extends Controller
{
    //
    public function __construct(){
        $this->middleware(['role:institution']);
        $this->middleware(['role:trainer']);
    }
}
