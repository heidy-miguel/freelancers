<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Instructor\InstructorController;
use App\Http\Controllers\Trainee\TraineeController;
use App\Http\Controllers\Training\TrainingController;
use App\Http\Controllers\Job\JobController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('user')->name('user.')->group(function(){
  
    Route::middleware(['guest:web','PreventBackHistory'])->group(function(){
          Route::view('/login','dashboard.user.login')->name('login');
          Route::view('/register','dashboard.user.register')->name('register');
          Route::post('/create',[UserController::class,'create'])->name('create');
          Route::post('/check',[UserController::class,'check'])->name('check');
    });

    Route::middleware(['auth:web','PreventBackHistory'])->group(function(){
          Route::view('/home','dashboard.user.home')->name('home');
          Route::post('/logout',[UserController::class,'logout'])->name('logout');
          Route::get('/add-new',[UserController::class,'add'])->name('add');
    });

});

Route::prefix('admin')->name('admin.')->group(function(){
       
    Route::middleware(['guest:admin','PreventBackHistory'])->group(function(){
          Route::view('/login','dashboard.admin.login')->name('login');
          Route::post('/check',[AdminController::class,'check'])->name('check');
    });

    Route::middleware(['auth:admin','PreventBackHistory'])->group(function(){
        Route::view('/jobs','dashboard.admin.job.index')->name('jobs');
        Route::post('/jobs/setInstructor', [AdminController::class, 'setInstructor'])->name('setInstructor');
        Route::view('/dashboard','dashboard.admin.home')->name('dashboard');
        Route::get('job/{id}', [AdminController::class, 'show_job'])->name('show-job');
        Route::get('trainee/{id}', [AdminController::class, 'show_trainee'])->name('show-trainee');
        Route::get('/instructor/{id}', [AdminController::class, 'show_instructor'])->name('show-instructor');

        Route::view('instructor', 'dashboard.admin.instructor.index')->name('instructors');
        Route::view('trainee', 'dashboard.admin.trainee.index')->name('trainees');
        Route::post('/logout',[AdminController::class,'logout'])->name('logout');
    }); 

});

Route::prefix('instructor')->name('instructor.')->group(function(){

       Route::get('/explore',[InstructorController::class,'explore'])->name('explore');
       Route::middleware(['guest:instructor','PreventBackHistory'])->group(function(){
            Route::view('/login','dashboard.instructor.login')->name('login');
            Route::view('/register','dashboard.instructor.register')->name('register');
            Route::post('/create',[InstructorController::class,'create'])->name('create');
            Route::post('/check',[InstructorController::class,'check'])->name('check');
       });

       Route::middleware(['auth:instructor','PreventBackHistory'])->group(function(){
            Route::view('/home','dashboard.instructor.home')->name('home');
            Route::post('logout',[InstructorController::class,'logout'])->name('logout');
            Route::post('/update',[InstructorController::class,'update'])->name('update');
            Route::get('/edit',[InstructorController::class,'edit'])->name('edit');
            Route::post('/add-employment',[InstructorController::class,'addEmployment'])->name('add_employment');
            Route::post('/add-education',[InstructorController::class,'addEducation'])->name('add_education');
            Route::post('/add-language',[InstructorController::class,'addLanguage'])->name('add_language');
            Route::post('/update-personal-info', [InstructorController::class, 'update_personal_info'])->name('update_personal_info');
       });

});

Route::prefix('trainee')->name('trainee.')->group(function(){

       Route::middleware(['guest:trainee','PreventBackHistory'])->group(function(){
            Route::view('/login','dashboard.trainee.login')->name('login');
            Route::view('/register','dashboard.trainee.register')->name('register');
            Route::post('/create',[TraineeController::class,'create'])->name('create');
            Route::post('/check',[TraineeController::class,'check'])->name('check');
            //Route::post('/show',[TraineeController::class,'show'])->name('show');
       });

       Route::middleware(['auth:trainee','PreventBackHistory'])->group(function(){
            Route::view('/home','dashboard.trainee.home')->name('home');
            Route::post('/add-job', [TraineeController::class, 'add_job'])->name('add_job');
            Route::post('logout',[TraineeController::class,'logout'])->name('logout');
            Route::post('update',[TraineeController::class,'update'])->name('update'); 
       });
});

    Route::prefix('job')->name('job.')->group(function(){
    Route::get('/', [JobController::class, 'index'])->name('index');
    Route::get('show/{id}', [JobController::class, 'show'])->name('show');
});