<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin;
use App\Models\Job;
use App\Models\Trainee;
use App\Models\Instructor;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function show_job($id){
        $job = Job::find($id);
        if($job){
            return view('dashboard.admin.job.show')->with('job', $job); 
        }
    }


    public function show_instructor($id){
        $instructor = Instructor::find($id);
        $total_jobs = $instructor->jobs->count();
        if($instructor){
            return view('dashboard.admin.instructor.show')
            ->with(['instructor' => $instructor, 'total_jobs' => $total_jobs]);  
        }
    }

    public function show_trainee($id){
        $trainee = Trainee::find($id);
        $total_jobs = $trainee->jobs->count();
        $paginated_jobs = $trainee->jobs()->paginate(2);
        if($trainee){
            return view('dashboard.admin.trainee.show')
            ->with([
                'trainee' => $trainee, 
                'total_jobs' => $total_jobs,
                'paginated_jobs' => $paginated_jobs,
            ]);  
        }
    }

    public function setInstructor(Request $request){
        $job = Job::find($request->input('job_id'));
        if($job){
            $job->instructor_id = $request->input('instructor_id'); 
            $updated = $job->update();

            return redirect()->route('show-job', [$job->id]);

        }
    }


    function check(Request $request){
         //Validate Inputs
         $request->validate([
            'email'=>'required|email|exists:admins,email',
            'password'=>'required|min:5|max:30'
         ],[
             'email.exists'=>'This email is not exists in admins table'
         ]);

         $creds = $request->only('email','password');

         if( Auth::guard('admin')->attempt($creds) ){
             return redirect()->route('admin.dashboard');
         }else{
             return redirect()->route('admin.login')->with('fail','Incorrect credentials');
         }
    }

    function logout(){
        Auth::guard('admin')->logout();
        return redirect('/');
    }
}
