<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function __construct(){
        $this->middleware(['role:admin']);
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

    public function trainers(){
        $trainers = User::where('role', 'like', 'trainer')->orderBy('created_at', 'desc')->paginate(15); 
        return view('users.trainers')->withTrainers($trainers);
    }

    public function institutions(){
        $institutions = User::where('role', 'like', 'institution')->orderBy('created_at', 'desc')->paginate(15); 
        return view('users.institutions')->withInstitutions($institutions);
    }

    public function managers(){
        $managers = User::where('role', 'like', 'manager')->orderBy('created_at', 'desc')->paginate(15); 
        return view('users.managers')->withManagers($managers);
    }
}
