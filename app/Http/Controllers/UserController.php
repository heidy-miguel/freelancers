<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Solicitation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PDF;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::with('roles')->orderBy('id', 'desc')->paginate(15);
        return view('user.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        if(!(Auth::user()->hasRole(['escrivão', 'super admin']))){
            $request->session()->flash('not-allowed', 'Não tens permissão suficiente!');
            return redirect()->route('users.show', [Auth::id()]);
        }

        $roles = Role::all()->pluck('name');
        return view('user.create')->with('roles', $roles); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $user = new User();

        $user->first_name = $request->input('first_name');
        $user->middle_name = $request->input('middle_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->phone = $request->input('phone');
        $user->bio = $request->input('bio');
        $user->code = $request->input('code');

        $exists = User::where('email', $user->email)->first();
        if($exists){
            return redirect()->route('users.create')->withInput($request->except('password'));
        }
        $user->assignRole($request->input('roles'));
        $user->save();
        $request->session()->flash('message', 'Usuário criado com sucesso!');
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        //
        $user = User::find($id);
        if(!$user){
            $request->session()->flash('message', 'o usuário');
            return redirect('404');
        }

        if((Auth::id() != $user->id) && !(Auth::user()->hasRole(['escrivão', 'super admin']))){
            $request->session()->flash('not-allowed', 'Não tens permissão para ver o perfil');
            return redirect()->route('users.show', [Auth::id()]);
        }
        return view('user.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::where('id', $id)->first();
        if(!$user){
            $request->session()->flash('message', 'o usuário');
            return redirect('404');
        }
        $roles = Role::all()->pluck('name');
        return view('user.edit')->with(['user'=> $user, 'roles' => $roles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $user = User::find($id);
        $user->first_name = $request->input('first_name');
        $user->middle_name = $request->input('middle_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->phone = $request->input('phone_one');
        $user->bio = $request->input('bio');
        $user->code = $request->input('code');
        $user->update();
        $user->syncRoles($request->input('roles'));
        $request->session()->flash('message', 'Usuário actualizado com sucesso!');
        return redirect()->route('users.show', [$user->id])->with('user', $user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = User::find($id);
        $user->delete();
        return redirect()->route('users.index');
    }

    public function set_manager(Request $request, $id){
        $solicitation = Solicitation::find($id);
        if($solicitation){
            $user_id = $request->input('user_id');
            $solicitation->user_id = $user_id;
            $solicitation->update();
        }
        return redirect()->route('solicitation.index');
    }


    public function search(Request $request){
        $query = $request->input('q');
        $users = User::where([
            ['first_name', '!=', Null], [function($query) use ($request){
                if(($q = $request->q)){
                    $query->orWhere('first_name', 'LIKE', '%' . $q . '%')->get();
                }
            }]
        ])->orderBy('id', 'desc')->paginate(10);
        return view('user.results')->with(['users' => $users ]);
    }
}
