<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUniversityFormRequest;
use App\Models\University;
use Illuminate\Http\Request;

class UniversityController extends Controller
{
    public function voir(Request $request)
    {
        $university = University::findOrFail($request->university_id);
        return view('universities.details',compact('university'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function liste()
    {
        $university=University::paginate(10);
        
        return view('universities.liste',compact('university'));
    }

    public function index()
    {
        $university=University::paginate(10);

        $titre='université';
        return view('admin.universities.liste',compact('university','titre'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $university = new University();
        $ville = Controller::enumerer('universities','ville');
        $province = Controller::enumerer('universities','province');
        return view('admin.universities.create',compact('university','ville','province'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUniversityFormRequest $request)
    {
        University::create($request->only('name','slogan','ville','website','wechat','ranking','province','details'));
        
        flashy()->message('Programme crée avec succès');
        return redirect(route('universities.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $university = University::findOrFail($id);
        $ville = Controller::enumerer('universities','ville');
        $province = Controller::enumerer('universities','province');
        return view('admin.universities.update',compact('university','ville','province'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateUniversityFormRequest $request,$id)
    {
        $university = University::findOrFail($id);
        $university->update($request->only('name','slogan','ville','website','wechat','ranking','province','details'));

        flashy()->success(sprintf("l'université '%s' a été modifié avec succès",$university->name));
        return redirect(route('universities.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $university = University::findOrFail($id);
        $university->delete();

        flashy()->error(sprintf("l'université '%s' a été supprimé avec succès",$university->name));
        return redirect(route('universities.index'));
    }
}
