<?php

namespace App\Http\Controllers\Trainee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Trainee;
use Illuminate\Support\Facades\Auth;

class TraineeController extends Controller
{
    function create(Request $request){
          //Validate inputs
          $request->validate([
             'name'=>'required',
             'email'=>'required|email|unique:trainees,email',
             'hospital'=>'required',
             'password'=>'required|min:5|max:30',
             'cpassword'=>'required|min:5|max:30|same:password'
          ]);

          $treinee = new Trainee(); 
          $treinee->name = $request->name;
          $treinee->email = $request->email;
          $treinee->hospital = $request->hospital;
          $treinee->password = \Hash::make($request->password);
          $save = $treinee->save();

          if( $save ){
              return redirect()->back()->with('success','You are now registered successfully as Trainee');
          }else{
              return redirect()->back()->with('fail','Something went Wrong, failed to register');
          }
    }

    function show($id){
      $treinee = Trainee::find($id);
      return view('trainee.show', ['trainee', $trainee]);
    }


        public function update(Request $request)
    {
        //
        $request->validate([
            'image' => 'image|mimes:jpeg,jpg,png|max:2048',
            'name' => 'required',
            'email' => 'required'
        ]);

        $trainee = Trainee::find($request->input('id'));
        $trainee->name = $request->input('name');
        $trainee->email = $request->input('email');
        $trainee->address = $request->input('address');
        $trainee->city = $request->input('city');
        $trainee->phone = $request->input('phone');
        $trainee->description = $request->input('description');
        if($request->hasFile('image')){

        $image_name = time() . '_' . $trainee->name . '.' . $request->image->extension();
        $trainee->picture = $image_name;
        $request->image->move(public_path('img/trainees/'), $image_name);
        }
        $trainee->save();
        $request->session()->flash('message', 'Actualizado com sucesso!');
        return redirect()->route('trainee.home', [$trainee->id]);
    }

    function check(Request $request){
        //Validate Inputs
        $request->validate([
           'email'=>'required|email|exists:trainees,email',
           'password'=>'required|min:5|max:30'
        ],[
            'email.exists'=>'This email is not exists in trainee table'
        ]);

        $creds = $request->only('email','password');

        if( Auth::guard('trainee')->attempt($creds) ){
            return redirect()->route('trainee.home');
        }else{
            return redirect()->route('trainee.login')->with('fail','Incorrect Credentials');
        }
    }

    function logout(){
        Auth::guard('trainee')->logout();
        return redirect('/');
    }
}
