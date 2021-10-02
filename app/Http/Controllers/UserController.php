<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public __construct(){
        $this->middleware(['admin']);
    }
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        $users = User::where('id', '>=', 1)->orderBy('created_at', 'desc')->paginate(15);
        return view('users.index')->with('users', $users);
    } 
}
