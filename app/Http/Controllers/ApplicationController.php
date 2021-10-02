<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use App\Http\Requests\ApplicationRequest;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

class ApplicationController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applications = Application::where('id', '>=', 1)->orderBy('created_at', 'desc')->paginate(15);
        return view('applications.index')->withApplications($applications);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('applications.create')->withCategories(Category::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ApplicationRequest $request)
    {
        $app = new Application();
        $app->title = $request->input('title');
        $app->start_date = $request->input('start_date');
        $app->end_date = $request->input('end_date');
        $app->description = $request->input('description');
        $app->user_id = auth()->user()->id;
        $app->save();
        $category_ids = $request->input('categories');
        $app->category()->attach($category_ids);
        return redirect()->route('application.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $app = Application::find($id);
        return view('applications.show')->with('app', $app);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $app = Application::find($id);

        return view('applications.edit')->with([
            'application' => $app, 
            'categories' => Category::all(),
            'trainers' => User::all(),
            'managers' => User::manager(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $app = Application::find($id);
        if(auth()->user()->role('institution')){
            $app->update([
                'title' => $request->input('title'),
                'start_date' => $request->input('start_date'),
                'end_date' => $request->input('end_date'),
                'end_date' => $request->input('end_date'),
                'category_id' => $request->input('category_id'),
            ]);
            return back()->withStatus('Solicitação salva com sucesso');
        } else {
            $app->update([
                'manager_id' => $request->input('manager_id'),
                'trainer_id' => $request->input('trainer_id'),
            ]);
            return redirect()->route('applications.index')->withStatus('Solicitação salva com sucesso');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function destroy(Application $application)
    {
        //
    }
}
