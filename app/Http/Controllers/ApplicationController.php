<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\EtudiantStory;
use App\Models\EtudiantBackground;
use App\Models\PhotoProfil;
use App\Models\PhotoApplication;
use App\Models\Passeport;
use App\Models\DegreeOriginal;
use App\Models\Degree;
use App\Models\Transcript;
use App\Models\TranscriptOriginal;
use App\Models\Letter1;
use App\Models\Letter2;
use App\Models\StudyPlan;
use App\Models\Medical;
use App\Models\NonCriminal;
use App\Models\Language;
use App\Models\Formulaire;
use App\Models\BankStatement;
use App\Models\AutreApplication;
use App\Models\Bourse;
use Illuminate\Support\Str;
use App\Http\Middleware\GererBourse;
use Illuminate\Support\Facades\Storage;

class ApplicationController extends Controller
{
    public function visualiser(Request $request)
    {
        $application = Application::findOrFail($request->application);

        $story = EtudiantStory::where('id',$application->etudiant_id)->first();
        $document = $application->id;

        $fichier = PhotoProfil::where('user_id',auth()->user()->id)->first();
        $fichier = image($fichier);

        return view('users.applications.details',compact('application','fichier','story','document'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view(Request $request)
    {
        
        $etudiant = EtudiantStory::where('user_id',auth()->user()->id)->get();
        if (count($etudiant)==0) {
            flashy()->message("Vous n'avez d'étudiants enregistrés, veuillez en enregistrer");    
            return redirect(route('application_step1'));
        } else {
            foreach ($etudiant as $value) {
                $student = $value->id;
                $nom = $value->family_name.' '.$value->given_name;

                $appli = Application::where('etudiant_id',$student)->get();
                if (count($appli)==0) {
                    flashy()->message("Vous n'avez aucune application enregistré avec cet utilisateur, veuillez sélectionner une bourse et continuer votre inscription");    
                    return redirect(route('bourses.liste'));
                }else{

                    foreach ($appli as $e) {
                        $fichier = PhotoProfil::where('user_id',auth()->user()->id)->first();
                        $fichier = image($fichier);
                        $b = $e->bourse_id;
                        $programme = Bourse::find($b)->programme;
                        $filiere = $programme->name;
                        $diplome = $programme->degree;
                        $id = $e->id;
                        $code = $e->code;
                        $status = $e->statut;
                        $date = $e->updated_at;
                        $request->session()->put('id',$id);
                        return view('users.applications.voir',compact('id','code','nom','diplome','filiere','status','date','fichier','b'));
                    }
                }
                
            }
        }
    }

    public  function info()
    {
        $fichier = PhotoProfil::where('user_id',auth()->user()->id)->first();
        if(!is_null($fichier)){
            $fichier = image($fichier);
        }else{
            $fichier = 'ib-logo.png';
        }

        $bourse = session('bourse');
        $infoBourse = Bourse::where('id',$bourse)->first();
        return view('users.applications.application',compact('bourse','fichier','infoBourse'));
        
    }

    public function etape1(Request $request)
    {
        $controller = new Controller();
        $diplome = $controller -> enumerer('etudiant_stories','highest_degree');
        $bourse = session('bourse');
        $etudiant = session('etudiant');
        $fichier = PhotoProfil::where('user_id',auth()->user()->id)->first();
        $user = auth()->user()->id;
        $pays = Controller::enumerer('etudiant_stories','pays');
        if (!is_null($etudiant)) {
            $story = EtudiantStory::where('id',session('etudiant'))->first();
            
            $fichier = image($fichier);

            return view('users.application_step1',compact('fichier','story','diplome','user','bourse','pays'));
            
        }
        if (!is_null(session('id'))) {
            $appli = Application::where('id',session('id'))->first();
            $story = EtudiantStory::where('id',$appli->id)->first();
            if(is_null($fichier)){
                $fichier = 'ib-logo.png';
                return view('users.application_step1',compact('fichier','story','diplome','user','bourse','pays'));
            }else{
                $fichier = image($fichier);

                return view('users.application_step1',compact('fichier','story','diplome','user','bourse','pays'));
            }
        }
/*
        
        $controller = new Controller();
        $diplome = $controller -> enumerer('etudiant_stories','highest_degree');
        */
        //dd(session('etudiant'));

        /*$bourse = session('bourse');dd($bourse,session('etudiant'));

        $fichier = PhotoProfil::where('user_id',auth()->user()->id)->first();*/
        
        $story = EtudiantStory::where('user_id',auth()->user()->id)->orderBy('id','desc')->first();
        if(!is_null($story)){
            $story = $story;
        }else{
            $story = new EtudiantStory();
        }
        if(is_null($fichier)){
            $fichier = 'ib-logo.png';
            return view('users.application_step1',compact('fichier','story','diplome','user','bourse','pays'));
        }else{
            $fichier = image($fichier);
            return view('users.application_step1',compact('fichier','story','diplome','user','bourse','pays'));
        }
    }

    public function etape2(Request $request)
    {
        $fichier = PhotoProfil::where('user_id',auth()->user()->id)->first();
        $bourse = session('bourse');
        $user = auth()->user()->id;
        $studentEdu = session('etudiant');
        if (!is_null($studentEdu)) {
            $background = EtudiantStory::where('id',$studentEdu)->first();
            $appli = Application::where('etudiant_id',$studentEdu)->first();
            if (!is_null($appli)) {
                if (is_null($bourse)) {
                    flashy()->message('Vous n\'avez pas choisie de bourse');
                } else {
                    $verify = Application::where('id',$appli->id)->where('bourse_id',$bourse)->first();
                    if (!is_null($verify)) {
                        $application = $verify->id;
                        $request->session()->put('id',$application);

                    } else {

                        $application = new Application();
                        $application->etudiant_id = $studentEdu;
                        $application->bourse_id = $bourse;
                        $application->save();
                        
                        $application = Application::where('etudiant_id',$studentEdu)->where('bourse_id',$bourse)->first()->id;
                        $request->session()->put('id',$application);  
                    }
                }
            } else {
                if (is_null($bourse)) {
                    flashy()->message('Vous n\'avez pas choisie de bourse');
                    
                } else {
                    $application = new Application();
                    $application->etudiant_id = $studentEdu;
                    $application->bourse_id = $bourse;
                    $application->save();
                    
                    if($application->save()){
                        $applica = Application::where('etudiant_id',$studentEdu)->orderBy('id','desc')->first()->id;
                        $request->session()->put('id',$applica);
                    }

                    $application = Application::where('etudiant_id',$studentEdu)->where('bourse_id',$bourse)->first()->id;
                }
            }
            if(is_null($fichier)){

                $fichier = 'ib-logo.png';
                return view('users.application_step2',compact('fichier','background','user'));
            }else{
                $fichier = image($fichier);

                return view('users.application_step2',compact('fichier','background','user'));
            }
        }
        if (!is_null(session('id'))) {
            $appli = Application::where('id',session('id'))->first();
            $background = EtudiantStory::where('id',$appli->id)->first();
            if(is_null($fichier)){
                $fichier = 'ib-logo.png';
                return view('users.application_step2',compact('fichier','background','user'));
            }else{
                $fichier = image($fichier);

                return view('users.application_step2',compact('fichier','background','user'));
            }
        }
    }


    public function etape3()
    {
        $utilisateur = auth()->user()->id;
        $bourse = session('bourse');
        if (is_null($bourse)) {
            flashy()->error("Veuillez selectionner une bourse, sauvegarder tous les champs avant de continuer");
            return redirect(route('bourses.liste'));
        } else {
            $fichier = PhotoProfil::where('user_id',$utilisateur)->first();
            
            $application = session('id');
            if(is_null($fichier)){
                $fichier = 'ib-logo.png';
                return view('users.application_step3',compact('fichier','bourse','application'));
            }else{

                $fichier = image($fichier);
                
                return view('users.application_step3',compact('fichier','bourse','application'));
            }
        }
        
    }

    public function etape4()
    {
        
        $fichier = PhotoProfil::where('user_id',auth()->user()->id)->first();
        
        $bourse = session('bourse');

        $app = session('id');
        
        $photoApp = PhotoApplication::where('user_id',$app)->first();
        if (is_null($photoApp)) {
            flashy()->error('Veuillez ajouter le document suivant : Photo application');
            return back();
        }
        $passeport = Passeport::where('user_id',$app)->first();
        if (is_null($passeport)) {
            flashy()->error('Veuillez ajouter le document suivant : Photo application');
            return back();
        }
        $diplomeOri = DegreeOriginal::where('user_id',$app)->first();
        if (is_null($diplomeOri)) {
            flashy()->error('Veuillez ajouter le document suivant : Photo application');
            return back();
        }
        $diplo = Degree::where('user_id',$app)->first();
        if (is_null($diplo)) {
            flashy()->error('Veuillez ajouter le document suivant : Photo application');
            return back();
        }
        $relevOri = TranscriptOriginal::where('user_id',$app)->first();
        if (is_null($relevOri)) {
            flashy()->error('Veuillez ajouter le document suivant : Photo application');
            return back();
        }
        $relev = Transcript::where('user_id',$app)->first();
        if (is_null($relev)) {
            flashy()->error('Veuillez ajouter le document suivant : Photo application');
            return back();
        }
        $lett1 = Letter1::where('user_id',$app)->first();
        if (is_null($lett1)) {
            flashy()->error('Veuillez ajouter le document suivant : Photo application');
            return back();
        }
        $lett2 = Letter2::where('user_id',$app)->first();
        if (is_null($lett2)) {
            flashy()->error('Veuillez ajouter le document suivant : Photo application');
            return back();
        }
        $studPl = StudyPlan::where('user_id',$app)->first();
        if (is_null($studPl)) {
            flashy()->error('Veuillez ajouter le document suivant : Photo application');
            return back();
        }
        $nonCr = NonCriminal::where('user_id',$app)->first();
        if (is_null($nonCr)) {
            flashy()->error('Veuillez ajouter le document suivant : Photo application');
            return back();
        }
        $medic = Medical::where('user_id',$app)->first();
        if (is_null($medic)) {
            flashy()->error('Veuillez ajouter le document suivant : Photo application');
            return back();
        }
        $ba = BankStatement::where('user_id',$app)->first();
        if (is_null($ba)) {
            flashy()->error('Veuillez ajouter le document suivant : Photo application');
            return back();
        }
        $formu = Formulaire::where('user_id',$app)->first();
        if (is_null($formu)) {
            flashy()->error('Veuillez ajouter le document suivant : Photo application');
            return back();
        }
        $etudiant = $app->etudiant_id;
        $request->session()->put('etudiant',$etudiant);
            
        $story = EtudiantStory::where('id',$etudiant)->first();
        $story_user = $story->user_id;
        $background = EtudiantStory::where('id',$etudiant)->first();

        if(is_null($fichier)){
            $fichier = 'ib-logo.png';
            return view('users.application_step4',compact('fichier','bourse','story','background','application'));
        }else{
            $fichier = image($fichier);
            return view('users.application_step4',compact('fichier','bourse','story','background','application'));
        }
    }

    public function modifie()
    {
        $student = session('etudiant');
        $application = Application::where('etudiant_id',$student);
        
        $application->update(['statut'=>'evaluation']);

        flashy()->message('Votre application a été soumis avec succes');

        return redirect(route('stories.liste'));
    }

    public function index()
    {
        $application = Application::paginate(10);
        $titre = 'application';
        return view('admin.applications.liste',compact('application','titre'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $etudiant = EtudiantStory::all();
        $statut = Controller::enumerer('applications','statut'); 
        return view('admin.applications.create',compact('etudiant','statut'));
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
            'etudiant_id'=>'required',
            'statut'=>'required',
            'bourse_id'=>'required',
        ]);

        Application::create($request->only('etudiant_id','statut','bourse_id'));
        flashy()->success('Application ajouté avec succès');
        return redirect(route('applications.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $application = Application::findOrFail($id);

        $story = EtudiantStory::where('id',$application->etudiant_id)->first();
        $document = $application->id;

        $background = EtudiantBackground::where('user_id',$story->user_id)->orderBy('id','desc')->first();

        $fichier = PhotoProfil::where('user_id',auth()->user()->id)->first();
        $fichier = image($fichier);

        return view('users.applications.details',compact('application','fichier','story','background','document'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $application = Application::findOrFail($id);
        $etudiant = EtudiantStory::all();
        $statut = Controller::enumerer('applications','statut');

        return view('admin.applications.update',compact('statut','etudiant','application'));

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
        $application = Application::findOrFail($id);
        $this->validate($request,[
                'etudiant_id'=>'required',
                'statut'=>'required',
                'bourse_id',
            ]);

        $application->update($request->only('etudiant_id','statut','bourse_id'));
        flashy()->success(sprintf('Application "%s" modifié avec succès',$application->code));

        $this->middleware('boursePlace');
        
        return redirect(route('applications.index'));
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
