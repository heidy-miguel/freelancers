<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SolicitationController;
use App\Http\Controllers\InstitutionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TrainerController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::view('/', 'welcome')->name('welcome');

Route::prefix('solicitacao')->name('solicitation.')->group(function(){
  Route::group(['middleware' => ['web']], function(){
            Route::get('/', [SolicitationController::class, 'index'])->name('index'); 
            Route::get('/create', [SolicitationController::class, 'create'])->name('create'); 
            Route::get('/show/{id}', [SolicitationController::class, 'show'])->name('show'); 
            Route::get('/edit/{id}', [SolicitationController::class, 'edit'])->name('edit'); 
            Route::post('/update/{id}', [SolicitationController::class, 'update'])->name('update'); 
            Route::post('store', [SolicitationController::class, 'store'])->name('store'); 
          });
});

Route::prefix('formador')->name('trainer.')->group(function(){
    Route::middleware(['guest:trainer'])->group(function(){
          Route::view('/login','trainer.login')->name('login');
          Route::post('/check',[TrainerController::class,'check'])->name('check');
          Route::view('/register', 'trainer.register')->name('register');
    });

    Route::group(['middleware' => ['web']], function(){
          Route::get('/', [TrainerController::class, 'index'])->name('index');
          Route::view('/dashboard','trainer.home')->name('home');
          Route::get('/show/{id}', [TrainerController::class, 'show'])->name('show'); 
          Route::view('/add-education', [TrainerController::class, 'add_education'])->name('add_education');
            Route::get('/edit/{id}', [TrainerController::class, 'edit'])->name('edit'); 
            Route::post('/update', [TrainerController::class, 'update'])->name('update'); 
          Route::post('/add-employment',[TrainerController::class,'add_employment'])->name('add_employment');
      });

    Route::middleware(['auth:web'])->group(function(){

    });
});

Route::prefix('instituicao')->name('institution.')->group(function(){
    Route::middleware(['guest:institution'])->group(function(){
          Route::view('/login','institution.login')->name('login');
          Route::post('/check',[InstitutionController::class,'check'])->name('check');
          Route::view('/register', 'institution.register')->name('register');
    });

    Route::middleware(['auth:web'])->group(function(){
            Route::view('dashboard','institution.home')->name('home');
            Route::get('/', [InstitutionController::class, 'index'])->name('index'); 
            Route::get('/show/{id}', [InstitutionController::class, 'show'])->name('show'); 
            Route::get('edit', [InstitutionController::class, 'edit'])->name('edit'); 
            Route::get('update', [InstitutionController::class, 'update'])->name('update'); 
            Route::get('store', [InstitutionController::class, 'update'])->name('store'); 
            Route::post('/solicitate', [InstitutionController::class, 'make_solicitation'])->name('solicitate'); 
        });
});

// Route::resource('users', 'App\Http\Controllers\UserController');
Route::prefix('users')->name('user.')->group(function(){
    Route::middleware(['auth:web'])->group(function(){
            Route::view('/dashboard', 'user.dashboard')->name('dashboard'); 
            Route::post('/set-manager/{id}', [UserController::class, 'set_manager'])->name('set-manager');
        });
});

