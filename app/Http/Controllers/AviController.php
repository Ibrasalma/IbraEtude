<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Avi;
use App\Models\User;
use App\Models\Bourse;
use Illuminate\Support\Str;

class AviController extends Controller
{
    public static function note(Request $request)
    {
        $bourse = $request->bourse_id;
        $user = $request->user_id;
        $note = $request->note;
        Avi::updateOrInsert(['user_id'=>$user,'bourse_id'=>$bourse],['note'=>$note]);

        flashy()->message('Vous avez donné votre note, merci');
        $bourse = Bourse::findOrFail($bourse);
        $request->session()->put('bourse', $request->bourse_id);
        return view('bourses.details',compact('bourse'));
    }
    public function comment(Request $request)
    {
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

        flashy()->message('Vous avez donné votre avis, merci');
        $bourse = Bourse::findOrFail($bourse);
        $request->session()->put('bourse', $request->bourse_id);
        return view('bourses.details',compact('bourse'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $avi=Avi::paginate(10);
        $titre='avi';
        return view('admin.applications.avis.liste',compact('avi','titre'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $utilisateurs = User::all();
        $bourses = Bourse::all();
        $avi = new Avi();
        return view('admin.applications.avis.create',compact('bourses','utilisateurs','avi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'bourse_id'=>'required|integer',
            'user_id'=>'required|integer',
            'avi'=>'string'
        ]);
        Avi::create($request->only('bourse_id','user_id','avi','approuved'));

        flashy()->message('Bourse crée avec succès');
        return redirect(route('avis.index'));
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
        $avi = Avi::findOrFail($id);
        $utilisateurs = User::all();
        $bourses = Bourse::all();
        return view('admin.applications.avis.update',compact('bourses','utilisateurs','avi'));
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
        $avis = Avi::findOrFail($id);
        $this->validate($request,[
            'bourse_id'=>'required|integer',
            'user_id'=>'required|integer',
            'avi'=>'string'
        ]);
        $bourse = $request->bourse_id;
        $user = $request->user_id;
        $avi = $request->avi;
        $approuved = $request->approuved;

        $avis->update($request->only('bourse_id','user_id','avi','approuved'));
        flashy()->success('Vous avez modifié l\'avis '.$avis->id);
        return redirect(route('avis.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
