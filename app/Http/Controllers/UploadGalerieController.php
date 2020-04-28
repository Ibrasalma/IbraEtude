<?php

namespace App\Http\Controllers;

use App\Models\Galerie;
use App\Models\University;
use App\Http\Requests\UploadGalerieFormRequest;
use Illuminate\Support\Str;

class UploadGalerieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galery=Galerie::paginate(10);
        $titre='galerie';
        return view('admin.universities.galeries.liste',compact('galery','titre'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $galery=new Galerie();
        $university=University::all();
        return view('admin.universities.galeries.create',compact('galery','university'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UploadGalerieFormRequest $request)
    {
        $file= $request->file('filename');

        if ($file->isValid()) {
            
            $fileUpload = new Galerie;
            $fileUpload->filename = $request->file('filename')->hashName();
            $fileUpload->extension = $request->file('filename')->extension();
            $fileUpload->filesize = $request->file('filename')->getClientSize();
            $university = University::where('id',$request->univ_id)->first()->code;
            $filename = Str::slug($fileUpload->filename).''.$university.'.' .$file->getClientOriginalExtension();
            $fileUpload->location = $request->file('filename')->storeAs('public/universityGaleries',$filename);
            $fileUpload->university_id = $request->univ_id;
            $fileUpload->description = $request->description;
            $fileUpload->save();
            

            flashy()->success('Your file is currently being processed. You will be notified when done.');
 
            //UploadContacts::dispatch($fileUpload, $group)->onQueue('file-uploads');
            //dispatch(new UploadContacts($fileUpload, $group))->onQueue('file-uploads');
        } else {
            flashy()->error('There was a problem uploading your file. Please try again.');
        }

        return redirect(route('galeries.index'));
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
        $university = University::all();
        $galery = Galerie::findOrFail($id);
        return view('admin.universities.galeries.update',compact('galery','university'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UploadGalerieFormRequest $request, $id)
    {
        $file= $request->file('filename');

        if ($file->isValid()) {
            
            $fileUpload = Galerie::findOrFail($id);
            $fileUpload->filename = $request->file('filename')->hashName();
            $fileUpload->extension = $request->file('filename')->extension();
            $fileUpload->filesize = $request->file('filename')->getClientSize();
            $university = University::where('id',$request->univ_id)->first()->code;
            $filename = Str::slug($fileUpload->filename).''.$university.'.' .$file->getClientOriginalExtension();
            $fileUpload->location = $request->file('filename')->storeAs('universityGaleries',$filename);
            $fileUpload->university_id = $request->univ_id;
            $fileUpload->description = $request->description;

            $fileUpload->update();
 
            

            flashy()->success('Your file is currently being processed. You will be notified when done.');
 
        } else {
            flashy()->error('There was a problem uploading your file. Please try again.');
        }

        return redirect(route('galeries.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $element = Galerie::findOrFail($id);
        $element->delete();

        flashy()->error(sprintf("le fichier '%s' a été supprimé avec succès, veuillez ajouter un autre",$element->name));
        return back();
    }
}
