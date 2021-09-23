<?php

namespace App\Http\Controllers\Trainee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Trainee;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;

class TraineeController extends Controller
{

    function create(Request $request){
          //Validate inputs
          $request->validate([
             'name'=>'required',
             'email'=>'required|email|unique:trainees,email',
             'password'=>'required|min:5|max:30',
             'cpassword'=>'required|min:5|max:30|same:password'
          ]);

          $treinee = new Trainee(); 
          $treinee->name = $request->name;
          $treinee->email = $request->email;
          $treinee->password = \Hash::make($request->password);
          $save = $treinee->save();

          if( $save ){
              return redirect()->route('trainee.login');
          }else{
              return redirect()->back()->with('fail','Something went Wrong, failed to register');
          }
    }

    public function show($id){
      $treinee = Trainee::find($id);
      return view('trainee.show', ['trainee', $trainee]);
    }


    public function update(Request $request){
        //
        // $request->validate([
        //     'image' => 'image|mimes:jpeg,jpg,png|max:1024',
        //     'name' => 'required',
        //     'email' => 'required'
        // ]);

        $trainee = Trainee::find($request->input('trainee_id'));
        $trainee->name = $request->input('name');
        $trainee->email = $request->input('email');
        $trainee->address = $request->input('address');
        $trainee->city = $request->input('city');
        $trainee->phone = $request->input('phone');
        $trainee->description = $request->input('description');

        $picture_name = null;
        if($request->hasFile('picture')){  
          $path = 'public/img/trainees/';
          error_log('RRRRRRRRRRRRRRR');  
          // $picture_name = ucwords($request->name) . '/' . time() . '.' . $request->picture->extension();
          // $request->picture->storeAs($path, $picture_name);
        }

        $trainee->save();
        $request->session()->flash('message', 'Actualizado com sucesso!');
        return redirect()->route('trainee.home', [$trainee->id]);
    } 

    public function add_job(Request $request){
      $job = new Job();
      $job->title = $request->input('title');
      $job->start_date = $request->input('start_date');
      $job->end_date = $request->input('end_date');
      $job->description = $request->input('description'); 
      $job->trainee_id = $request->input('trainee_id'); 
      $job->rate = $request->input('rate'); 
      $job->address = $request->input('address'); 
      $job->description = $request->input('description');
      $job->save();

      return redirect()->route('job.show', [$job->id]);

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
