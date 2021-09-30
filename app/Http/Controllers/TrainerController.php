<?php

namespace App\Http\Controllers;

use App\Models\Trainer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trainers = Trainer::all();
        return view('trainer.index')->with('trainers', $trainers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Trainer  $trainer
     * @return \Illuminate\Http\Response
     */
    public function show(Trainer $trainer, $id)
    {
        $trainer = Trainer::find($id);
        return view('trainer.show')->with('trainer', $trainer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Trainer  $trainer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
      $trainer = Trainer::find($id);
      return view('trainer.edit')->with('trainer', $trainer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Trainer  $trainer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trainer $trainer)
    {
      $trainer = Trainer::find($request->input('trainer_id'));
      if($trainer){

        $trainer->name = $request->input('name');
        $trainer->surname = $request->input('surname');
        $trainer->email = $request->input('email');
        $trainer->address = $request->input('address');
        $trainer->profession = $request->input('profession');
        $trainer->phone = $request->input('phone');
        $trainer->birth_date = $request->input('birth_date');
        $trainer->bio = $request->input('bio');
        $trainer->update();
        return redirect()->route('trainer.home', [$trainer->id]);
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Trainer  $trainer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trainer $trainer)
    {
        //
    }

    function check(Request $request){
        //Validate Inputs
        $request->validate([
           'email'=>'required|email|exists:trainers,email',
           'password'=>'required|min:5|max:30'
        ],[
            'email.exists'=>'Esse e-mail não existe no nosso sistema'
        ]);

        $creds = $request->only('email','password');

        if( Auth::guard('trainer')->attempt($creds) ){
            return redirect()->route('trainer.home'); 
        }else{
            return redirect()->route('trainer.login')->with('fail','Credenciais erradas');
        }
    }

    public function add_education(){
      $id = $request->input('instructor_id');
      $instructor = Instructor::find($id);
      $education = new Education();
      $education->study_area = $request->input('study_area');
      $education->school = $request->input('school');
      $education->degree = $request->input('degree');
      $education->start_date = $request->input('start_date');
      $education->end_date = $request->input('end_date');
      $education->description = $request->input('description');
      $education->instructor_id = $instructor->id;
      $saved = $education->save();

      $certificate_name = null;
      if($request->hasFile('file')){
        $certificate = new Certificate();
        $certificate->name = $education->study_area;
        $certificate->education()->associate($education);

          $path = 'public/docs/instructors/' . ucwords($instructor->first_name) . '_' . ucwords($instructor->last_name) . '/certificate/';
          $certificate_name = $education->study_area . '.' . $request->file->extension();
          $certificate->name = 'storage/docs/instructors' . '/' . ucwords($instructor->first_name) . '_' . ucwords($instructor->last_name) . '/' . $certificate->name . '.' . $request->file->extension();
          $certificate->path = $path;
          $certificate->save();
          $request->file->storeAs($path, $certificate_name);
      }

      if(!$saved){
        return response()->json(['code' => 0, 'message' => 'Something whent wrong!']);
      } else {
        return redirect()->route('instructor.home');
      }
    }

    public function add_employment(){
      $id = $request->input('id');
      $instructor = Instructor::find($id);
      $job = new Employment();
      $job->title = $request->input('title');
      $job->start_date = $request->input('start_date');
      $job->end_date = $request->input('end_date');
      $job->instructor_id = $instructor->id;
      $job->description = $request->input('description');
      $saved = $job->save();
      if(!$saved){
        return response()->json(['code' => 0, 'message' => 'Something whent wrong!']);
      } else {
        return redirect()->route('instructor.redit');
      }
        
    }
}
