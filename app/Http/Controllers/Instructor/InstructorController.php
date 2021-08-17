<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Instructor;
use App\Models\Course;
use App\Models\Employment;
use App\Models\Education;
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
          ]);

          $instructor = new Instructor(); 
          $instructor->first_name = $request->first_name;
          $instructor->last_name = $request->last_name; 
          $instructor->email = $request->email;
          $instructor->password = \Hash::make($request->password);
          $save = $instructor->save();

          if( $save ){
              return view('dashboard.instructor.home')->with('instructor',$save);
          }else{
              return redirect()->back()->with('fail','Algo correu mal, registo não afectuado.');
          }
    }

    public function edit(Request $request)
    {
      $instructor = Instructor::find(Auth::id());

      return view('dashboard.instructor.edit')->with('instructor', $instructor);
    }

    public function addEmployment(Request $request){
      $id = $request->input('id');
      $instructor = Instructor::find($id);
      $job = new Employment();
      $job->company = $request->input('company');
      $job->city = $request->input('city');
      $job->country = $request->input('country');
      $job->title = $request->input('title');
      $job->start_date = $request->input('start_date');
      $job->end_date = $request->input('end_date');
      $job->instructor_id = $instructor->id;
      $job->description = $request->input('description');
      $saved = $job->save();
      if(!$saved){
        return response()->json(['code' => 0, 'message' => 'Something whent wrong!']);
      } else {
        return response()->json(['code' => 1, 'message' => 'New added!']);
      }
    }


    public function addEducation(Request $request){
      $id = $request->input('instructor_id');
      $instructor = Instructor::find($id);
      $education = new Education();
      $education->study_area = $request->input('study_area');
      $education->school = $request->input('school');
      $education->degree = $request->input('degree');
      $education->start_date = $request->input('start_date');
      $education->end_date = $request->input('end_date');
      $education->instructor_id = $instructor->id;
      $saved = $education->save();

      if(!$saved){
        return response()->json(['code' => 0, 'message' => 'Something whent wrong!']);
      } else {
        return response()->json(['code' => 1, 'message' => 'New added!']);
      }
    }

    public function addLanguage(Request $request){
      // $id = $request->input('instructor_id');
      // $instructor = Instructor::find($id);
      // $language = new Language();
      // $language->
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
        // $request->validate([
        //     'image' => 'image|mimes:jpeg,jpg,png|max:2048',
        //     'first_name' => 'required',
        //     'last_name' => 'required',
        //     'email' => 'required'
        // ]);

        $instructor = Instructor::find($request->input('instructor_id'));

        // $instructor->first_name = $request->input('first_name');
        // $instructor->middle_name = $request->input('middle_name');
        // $instructor->last_name = $request->input('last_name');
        // $instructor->email = $request->input('email');
        // $instructor->phone = $request->input('phone');
        // $instructor->experience = $request->input('experience');
        // if($request->hasFile('image')){

        // $image_name = time() . '_' . $instructor->first_name . '.' . $request->image->extension();
        // $instructor->picture = $image_name;
        // $request->image->move(public_path('img/instructors/'), $image_name);
        // }
        //$instructor->save();
        
        $courses = $request->input('courses');
        $instructor->courses()->detach();
        $instructor->courses()->attach($courses);
        
        $skills = $request->input('skills');
        $instructor->skills()->detach();
        $instructor->skills()->attach($skills);

        $languages = $request->input('languages');
        $instructor->languages()->detach();
        $instructor->languages()->attach($languages);

        
        $request->session()->flash('message', 'Actualizado com sucesso!');
        return redirect()->route('instructor.home', [$instructor->id]);
    }

    public function explore(Request $request){
      $instructors = Instructor::has('skills')->get();
      return view('dashboard.instructor.explore')->with('instructors', $instructors);
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
