<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UploadContactRequest;
use App\Models\NonCriminal;

class UploadNonCriminalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photo = NonCriminal::paginate(10);
        $titre = 'police';
        return view('admin.applications.non_criminal.liste',compact('photo','titre'));
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
        $nombre = NonCriminal::where('user_id',$appli)->count();
        if($nombre >= 2){
            flashy()->error('Vous ne pouvez pas ajouter plus de 2 fichier');
        }else{
            upload('App\Models\NonCriminal',$request,'images/policeClearance');
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
        $element = NonCriminal::findOrFail($id);
        $element->delete();

        flashy()->error(sprintf("le fichier '%s' a été supprimé avec succès, veuillez ajouter un autre",$element->name));
        return back();
    }
}
