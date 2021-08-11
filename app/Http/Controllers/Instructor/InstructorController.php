<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Instructor;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;

class InstructorController extends Controller
{
    function create(Request $request){
          //Validate inputs
          $request->validate([
             'first_name'=>'required',
             'last_name'=>'required',
             'email'=>'required|email|unique:instructors,email',
             'password'=>'required|min:5|max:30',
             'cpassword'=>'required|min:5|max:30|same:password'
          ]);

          $instructor = new Instructor(); 
          $instructor->first_name = $request->first_name;
          $instructor->last_name = $request->last_name; 
          $instructor->birth_date = $request->birth_date; 
          $instructor->city = $request->city; 
          $instructor->email = $request->email;
          $instructor->password = \Hash::make($request->password);
          $save = $instructor->save();

          if( $save ){
              return redirect()->back()->with('success','You are now registered successfully as Instructor');
          }else{
              return redirect()->back()->with('fail','Something went Wrong, failed to register');
          }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $request->validate([
            'image' => 'image|mimes:jpeg,jpg,png|max:2048',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required'
        ]);

        $instructor = Instructor::find($request->input('id'));
        $instructor->first_name = $request->input('first_name');
        $instructor->middle_name = $request->input('middle_name');
        $instructor->last_name = $request->input('last_name');
        $instructor->email = $request->input('email');
        $instructor->phone = $request->input('phone');
        $instructor->experience = $request->input('experience');
        if($request->hasFile('image')){

        $image_name = time() . '_' . $instructor->first_name . '.' . $request->image->extension();
        $instructor->picture = $image_name;
        $request->image->move(public_path('img/instructors/'), $image_name);
        }
        $instructor->save();
        $courses = $request->input('courses');
        $instructor->courses()->detach();
        $instructor->courses()->attach($courses);
        $request->session()->flash('message', 'Actualizado com sucesso!');
        return redirect()->route('instructor.home', [$instructor->id]);
    }

    function check(Request $request){
        //Validate Inputs
        $request->validate([
           'email'=>'required|email|exists:instructors,email',
           'password'=>'required|min:5|max:30'
        ],[
            'email.exists'=>'This email is not exists in instructors table'
        ]);

        $creds = $request->only('email','password');

        if( Auth::guard('instructor')->attempt($creds) ){
          $courses = Course::all();
            return redirect()->route('instructor.home', ['courses' => Course::all()]);
        }else{
            return redirect()->route('instructor.login')->with('fail','Incorrect Credentials');
        }
    }

    function logout(){
        Auth::guard('instructor')->logout();
        return redirect('/');
    }
}
