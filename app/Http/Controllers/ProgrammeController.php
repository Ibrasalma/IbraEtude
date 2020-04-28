<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProgramFormRequest;
use App\Models\Programme;


class ProgrammeController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programme=Programme::paginate(10);
        $titre='programme';
        return view('admin.programmes.liste',compact('programme','titre'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $programme = new Programme();
        $diplome = Controller::enumerer('programmes','degree');
        $domaine = Controller::enumerer('programmes','domaine');
        $langue = Controller::enumerer('programmes','language');
        return view('admin.programmes.create',compact('programme','diplome','domaine','langue'));
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProgramFormRequest $request)
    {
        
        Programme::create($request->only('name','duration','degree','language','requirement','domaine','details','tuition','accomodation'));
        
        flashy()->message('Programme crée avec succès');
        return redirect(route('programmes.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Programme $programme)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Programme $programme)
    {
        $diplome = Controller::enumerer('programmes','degree');
        $domaine = Controller::enumerer('programmes','domaine');
        $langue = Controller::enumerer('programmes','language');
        return view('admin.programmes.update',compact('programme','diplome','domaine','langue'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateProgramFormRequest $request,Programme $programme)
    {
        $programme->update($request->only('name','duration','degree','language','requirement','domaine','details','tuition','accomodation'));

        flashy()->success(sprintf("l'utilisateur '%s' a été modifié avec succès",$programme->name));
        return redirect(route('programmes.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Programme $programme)
    {
        $programme->delete();

        flashy()->error(sprintf("l'utilisateur '%s' a été supprimé avec succès",$programme->name));
        return redirect(route('programmes.index'));
    }
}
