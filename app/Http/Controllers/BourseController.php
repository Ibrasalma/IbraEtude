<?php

namespace App\Http\Controllers;

use App\Models\Bourse;
use App\Models\Programme;
use App\Models\University;
use Illuminate\Http\Request;
use App\Http\Requests\CreateBourseFormRequest;

class BourseController extends Controller
{
    public function voir(Request $request)
    {
        dd('hello from the other side');
        $this->validate($request,[
            'bourse_id'=>'required|integer',
            'user_id'=>'required|integer',
            'avi'=>'string'
        ]);
        $bourse = $request->bourse_id;
        $user = $request->user_id;
        $avi = $request->avi;
        $approuved = 1;
        if (Str::contains($avi,'fuck') OR Str::contains($avi,'bitch') OR Str::contains($avi,'asshole') OR Str::contains($avi,'kill') OR Str::contains($avi,'hell') OR Str::contains($avi,'mother')) {
            $approuved = 0;
        }
        Avi::updateOrInsert(['user_id'=>$user,'bourse_id'=>$bourse],['avi'=>$avi,'approuved'=>$approuved]);



        return back();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function liste()
    {
        $bourse=Bourse::paginate(10);
        $categorie = Controller::enumerer('bourses','categorie');
        $ville = Controller::enumerer('universities','ville');
        $langue = Controller::enumerer('programmes','language');
        $domaine = Controller::enumerer('programmes','domaine');
        $university = University::all();
        return view('bourses.liste',compact('bourse','categorie','ville','langue','domaine','university'));
    }

    function sortCategorie($cat)
    {
        // return 
    }
            
    public function index()
    {
        $bourse=Bourse::paginate(10);
        $titre='bourse';
        return view('admin.bourses.liste',compact('bourse','titre'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $programme = Programme::all();
        $university = University::all();
        $categorie = Controller::enumerer('bourses','categorie');
        $bourse = new Bourse();
        return view('admin.bourses.create',compact('bourse','programme','university','categorie'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateBourseFormRequest $request)
    {
        Bourse::create($request->only('frais','duree','tuition','accomodation','categorie','programme_id','university_id','date_entree','stipend','revue','nbre_place','detail'));
        
        flashy()->message('Bourse crée avec succès');
        return redirect(route('bourses.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        $bourse = Bourse::findOrFail($id);
        $request->session()->put('bourse', $bourse->id);
        
        return view('bourses.details',compact('bourse'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $programme = Programme::all();
        $university = University::all();
        $categorie = Controller::enumerer('bourses','categorie');
        $bourse = Bourse::findOrFail($id);
        return view('admin.bourses.update',compact('bourse','programme','university','categorie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateBourseFormRequest $request, $id)
    {
        $bourse = Bourse::findOrFail($id);
        $bourse->update($request->only('frais','duree','tuition','accomodation','categorie','programme_id','university_id','date_entree','stipend','revue','nbre_place','detail'));
        
        flashy()->success(sprintf("Bourse qui a pour code '%s' a été modifié avec succès",$bourse->id));
        return redirect(route('bourses.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bourse = Bourse::findOrFail($id);

        $bourse->delete();

        flashy()->error(sprintf("Bourse qui a pour code '%s' a été supprimé avec succès",$bourse->name));
        return redirect(route('bourses.index'));
    }
}
