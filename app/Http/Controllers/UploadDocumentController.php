<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UploadContactRequest;

class UploadDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        upload('App\Models\PhotoApplication',$request,'images/photos');
        upload('App\Models\Passeport',$request,'images/passeports');
        upload('App\Models\DegreeOriginal',$request,'images/diplomeOriginal');
        upload('App\Models\Degree',$request,'images/diplomes');
        upload('App\Models\TranscriptOriginal',$request,'images/releveOriginals');
        upload('App\Models\Transcript',$request,'images/releves');
        upload('App\Models\Letter1',$request,'images/letter1s');
        upload('App\Models\Letter2',$request,'images/letter2s');
        upload('App\Models\StudyPlan',$request,'images/plans');
        upload('App\Models\Medical',$request,'images/medicals');
        upload('App\Models\NonCriminal',$request,'images/nonCriminals');
        upload('App\Models\BankStatement',$request,'images/banks');
        upload('App\Models\Language',$request,'images/langues');
        upload('App\Models\Formulaire',$request,'images/formulaires');
        upload('App\Models\AutreApplication',$request,'images/autres');
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
        //
    }
}
