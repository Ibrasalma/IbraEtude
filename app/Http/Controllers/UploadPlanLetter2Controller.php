<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UploadContactRequest;
use App\Models\Letter2;

class UploadPlanLetter2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photo = Letter2::paginate(10);
        $titre = 'lettre 2';
        return view('admin.applications.letter2.liste',compact('photo','titre'));
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
    public function store(UploadContactRequest $request)
    {
        $appli = $request->application;
        $nombre = Letter2::where('user_id',$appli)->count();
        if($nombre >= 2){
            flashy()->error('Vous ne pouvez pas ajouter plus de 2 fichier');
        }else{
            upload('App\Models\Letter2',$request,'images/letter2s');
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $element = Letter2::findOrFail($id);
        $element->delete();

        flashy()->error(sprintf("le fichier '%s' a été supprimé avec succès, veuillez ajouter un autre",$element->name));
        return back();
    }
}
