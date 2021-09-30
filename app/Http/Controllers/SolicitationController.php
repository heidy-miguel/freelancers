<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Solicitation;

class SolicitationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $solicitations = Solicitation::where('id', '>=', 1)->orderBy('created_at', 'desc')->paginate(20);
        return view('solicitation.index')->with('solicitations', $solicitations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('solicitation.create');
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
        $solicitation = new Solicitation();
        $solicitation->title = $request->input('title');
        $solicitation->start_date = $request->input('start_date');
        $solicitation->end_date = $request->input('end_date');
        $solicitation->description = $request->input('description');
        $solicitation->institution_id = $request->input('institution_id');
        $solicitation->save();
        $categories = $request->input('categories');
        $solicitation->categories()->attach($categories);
        return redirect()->route('institution.home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $solicitation = Solicitation::find($id);
        if($solicitation){
        return view('solicitation.show')->with('solicitation', $solicitation);
        }
        else { 
            return redirect()->route('home');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $solicitation = Solicitation::find($id);
        return view('solicitation.edit')->with('solicitation', $solicitation);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $solicitation = Solicitation::find($id);
        if($solicitation){
            $solicitation->title = $request->input('title');
            $solicitation->start_date = $request->input('start_date');
            $solicitation->end_date = $request->input('end_date');
            $solicitation->end_date = $request->input('end_date');
            $solicitation->description = $request->input('description');
            $solicitation->user_id = $request->input('user_id');
            $solicitation->update();
            $categories = $request->input('categories');
            $solicitation->categories()->detach();
            $solicitation->categories()->attach($categories);
            $request->session()->flash('message', 'Actualizado com sucesso!');

            return redirect()->route('solicitation.show', [$solicitation->id]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
    }
}
