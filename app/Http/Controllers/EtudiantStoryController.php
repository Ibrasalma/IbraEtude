<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EtudiantStory;
use App\Models\Application;
use App\Models\PhotoProfil;
use App\Models\User;
use App\Models\Bourse;
use App\Models\Programme;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CreateEtudiantStorieFormRequest;
use App\Http\Requests\CreateEtudiantBackgroundFormRequest;

class EtudiantStoryController extends Controller
{
    public function insert(CreateEtudiantBackgroundFormRequest $request)
    {

        $story = EtudiantStory::where('id',$request->background)->update($request->only('contact_name', 'contact_relationship', 'contact_occupation', 'contact_adress', 'contact_tel', 'contact_email', 'pere_name', 'pere_occupation', 'pere_adress', 'pere_tel', 'pere_email', 'mere_name', 'mere_occupation', 'mere_adress', 'mere_tel', 'mere_email', 'education_1_institutition', 'education_1_option', 'education_1_degree', 'education_1_start', 'education_1_end', 'education_2_institutition', 'education_2_option', 'education_2_degree', 'education_2_start', 'education_2_end', 'education_3_institutition', 'education_3_option', 'education_3_degree', 'education_3_start', 'education_3_end', 'work_institutition', 'work_post', 'work_categori', 'work_start', 'work_end'));
        if(!is_null(session('id'))){
            flashy()->message('application existe déjà');
        }else{
            $application = new Application();

            $bourse = session('bourse');
            if (is_null($bourse)) {
                flashy()->error('Avant de continuer veuillez selectionner une bourse');
                return redirect(route('bourses.liste'));
            } else {
                $passport = EtudiantStory::where('id',$request->background)->first()->passport_number;
                $code = $request->passport_number.'-'.$date->format('YMD').'-'.'E'.$request->user_id.'-'.'B'.$bourse;
                $application->code = $code;
                $etudiant_id = session('etudiant');
                $application->etudiant_id = $etudiant_id;
                $application->bourse_id = $bourse;
                $application->save();

                
                $applica = Application::where('code',$code)->first()->id;
                $request->session()->put('id',$applica);
                

                flashy()->message('vous avez fait une nouvelle application');
            }
        }
        flashy()->message('informations etudes enregistré avec succès');
        return back();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listeBourse()
    {
        $b = session('bourse');
        $id = session('id');
        $code = session('code');
        $nom = session('nom');
        $status = session('status');
        $date = session('date');
        $programme = Bourse::find($b)->programme;
        $filiere = $programme->name;
        $diplome = $programme->degree;
        $fichier = PhotoProfil::where('user_id',auth()->user()->id)->orderBy('id','desc')->first();
        $fichier = image($fichier);
        return view('users.applications.voir',compact('id','code','nom','diplome','filiere','status','date','fichier','b'));
    }

    public static function listEtudiant(Request $request)
    {
        $user = auth()->user()->id;
        $fichier = PhotoProfil::where('user_id',auth()->user()->id)->orderBy('id','desc')->first();
        $fichier = image($fichier);
        $etudiant = EtudiantStory::where('user_id',$user)->get();
        if(count($etudiant)!=0){
            foreach ($etudiant as $value) {
                $appli = Application::where('etudiant_id',$etudiant)->get();
                foreach ($appli as $app) {
                    $request->session()->put('bourse',$app->bourse_id);
                }
                $request->session()->put('etudiant', $value->id);
                return view('users.students.liste',compact('user','bourse','fichier','etudiant'));
            }
        }else{
            return view('users.students.liste',compact('user','bourse','fichier','etudiant'));
        }
    }

    public function liste(Request $request)
    {
        if(!is_null(session('etudiant'))){
            $etudiant = EtudiantStory::where('id',session('etudiant'));
        }else{
            $etudiant = EtudiantStory::where('user_id',auth()->user()->id)->get();
        }
        foreach ($etudiant as $value) {
            $student = $value->id;
            $nom = $value->family_name.' '.$value->given_name;

            $appli = Application::where('etudiant_id',$student)->get();
       
            foreach ($appli as $e) {
                $fichier = PhotoProfil::where('user_id',auth()->user()->id)->orderBy('id','desc')->first();
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
        flashy()->message("Vous n'avez aucune application enregistré avec cet utilisateur, veuillez sélectionner une bourse et continuer votre inscription");    
        return redirect(url('bourse/liste'));
    }

    public function voir(Request $request){
        
        $user = auth()->user()->id;
        $fichier = PhotoProfil::where('user_id',auth()->user()->id)->orderBy('id','desc')->first();
        $fichier = image($fichier);

        if (!is_null(session('bourse'))) {
            $bourse=session('bourse');

            $etudiant = EtudiantStory::where('user_id',$user)->get();
            if(count($etudiant)!=0){

                foreach ($etudiant as $value) {
                    $appli = Application::where('etudiant_id',$value->id)->where('bourse_id',$bourse)->first();
                    if (!is_null($appli)) {

                        $etud = $appli->etudiant_id;
                        $etudiant = EtudiantStory::where('user_id',auth()->user()->id)->where('id','<>',$etud)->get();
                        if (count($etudiant)!=0) {
                            foreach ($etudiant as $et) {
                                $request->session()->put('etudiant', $et->id);
                                return view('users.students.liste',compact('user','bourse','fichier','etudiant'));
                            }
                        } else {
                            $etudiant = EtudiantStory::where('user_id',$user)->get();
                            foreach ($etudiant as $value) {
                                $request->session()->put('etudiant', $et->id);
                                return view('users.students.liste',compact('user','bourse','fichier','etudiant'));
                            }
                        }
                        
                    } else {
                        $request->session()->put('etudiant', $value->id);
                        return view('users.students.liste',compact('user','bourse','fichier','etudiant'));
                    }
                }
            }else{
                return view('users.students.liste',compact('user','bourse','fichier','etudiant'));
            }
            
        }else {
            $etudiant = EtudiantStory::where('user_id',$user)->get();
            if (count($etudiant)!=0) {
                foreach ($etudiant as $value) {
                    $appli = Application::where('etudiant_id',$etudiant)->get();
                    foreach ($appli as $app) {
                        $request->session()->put('bourse',$app->bourse_id);
                    }
                    $request->session()->put('etudiant', $value->id);
                    return view('users.students.liste',compact('user','bourse','fichier','etudiant'));
                }
            } else {
                return view('users.students.liste',compact('user','bourse','fichier','etudiant'));
            }
            
        }
        
    }

    public function index()
    {
        $etudiant = EtudiantStory::paginate(10);
        $titre = 'etudiant';
        return view('admin.etudiants.stories.liste',compact('etudiant','titre'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $story = new EtudiantStory();
        $utilisateur = User::all();
        $bourse = Bourse::all();
        $diplome = Controller::enumerer('etudiant_stories','highest_degree'); 
        return view('admin.etudiants.stories.create',compact('story','utilisateur','bourse','diplome'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateEtudiantStorieFormRequest $request)
    {
        $user_id = auth()->user()->id;
        $given_name = $request->given_name;
        $family_name = $request->family_name;
        $birthdate = $request->birthdate;
        $birthplace = $request->birthplace;
        $passport_number = $request->passport_number;
        $passport_expire = $request->passport_expire;
        $nationality = $request->nationality;
        $gender = $request->gender;
        $marital_status = $request->marital_status;
        $occupation = $request->occupation;
        $affiliated = $request->affiliated;
        $highest_degree = $request->highest_degree;
        $relligion = $request->relligion;
        $hobbies = $request->hobbies;
        $is_in_china = $request->is_in_china;
        $studied_china = $request->studied_china;
        $pays = $request->pays;
        $ville = $request->ville;
        $adresse = $request->adresse;
        $code_postal = $request->code_postal;
        $mobile = $request->mobile;

        if(Str::contains(url()->previous(),"http://localhost:8000/etudiant/ajouter")){
            EtudiantStory::create([
                'user_id'=>$user_id,
                'family_name'=>$family_name,
                'given_name'=>$given_name,
                'birthdate'=>$birthdate,
                'birthplace'=>$birthplace,
                'passport_number'=>$passport_number,
                'passport_expire'=>$passport_expire,
                'nationality'=>$nationality,
                'gender'=>$gender,
                'marital_status'=>$marital_status,
                'occupation'=>$occupation,
                'affiliated'=>$affiliated,
                'highest_degree'=>$highest_degree,
                'relligion'=>$relligion,
                'hobbies'=>$hobbies,
                'is_in_china'=>$is_in_china,
                'studied_china'=>$studied_china,
                'pays'=>$pays,
                'ville'=>$ville,
                'adresse'=>$adresse,
                'code_postal'=>$code_postal,
                'mobile'=>$mobile
            ]);
            $etudiantE = EtudiantStory::where('user_id',$user_id)->orderBy('id','desc')->first()->id;
            $request->session()->put('etudiant',$etudiantE);

            $date = Carbon::now();
            $bourse = session('bourse');
            if (is_null($bourse)) {
                flashy()->message('Aucune bourse seléctionnez veuillez en selectionner pour continuer avec l\'étape 3');
                return back();
            } else {

                $code = $request->passport_number.'-'.$date->format('YMD').'-'.'E'.$request->user_id.'-'.'B'.$bourse;
                $etudiant_id = $etudiantE;
                $application = Application::updateOrInsert(
                    [
                        'code'=>$code
                    ],[
                        'etudiant_id'=>$etudiant_id,
                        'bourse_id'=>$bourse,
                ]);
                    
                $applica = Application::where('code',$code)->first()->id;
                $request->session()->put('id',$applica);

                flashy()->message('vous avez fait une nouvelle application');
                return back();
            }            
        }

        if (!is_null(session('etudiant'))) {

            flashy()->message('cet etudiant existe déjà, vous avez enregistré la modification, appuyez sur suivant pour continuer');
            $etude = EtudiantStory::findOrfail(session('etudiant'));
            $etude->update([
                'user_id'=>$user_id,
                'family_name'=>$family_name,
                'given_name'=>$given_name,
                'birthdate'=>$birthdate,
                'birthplace'=>$birthplace,
                'passport_number'=>$passport_number,
                'passport_expire'=>$passport_expire,
                'nationality'=>$nationality,
                'gender'=>$gender,
                'marital_status'=>$marital_status,
                'occupation'=>$occupation,
                'affiliated'=>$affiliated,
                'highest_degree'=>$highest_degree,
                'relligion'=>$relligion,
                'hobbies'=>$hobbies,
                'is_in_china'=>$is_in_china,
                'studied_china'=>$studied_china,
                'pays'=>$pays,
                'ville'=>$ville,
                'adresse'=>$adresse,
                'code_postal'=>$code_postal,
                'mobile'=>$mobile
            ]);
            $etudiantE = EtudiantStory::where('user_id',$user_id)->orderBy('id','desc')->first()->id;
            $request->session()->put('etudiant',$etudiantE);
            
            if(!is_null(session('id'))){
                flashy()->message('application existe déjà');
                return back();
            }else{
                $date = Carbon::now();
                $bourse = session('bourse');
                if (is_null($bourse)) {
                    return back();
                } else {

                    $code = $request->passport_number.'-'.$date->format('YMD').'-'.'E'.$request->user_id.'-'.'B'.$bourse;
                    $etudiant_id = $etudiantE;
                    $application = Application::updateOrInsert(
                        [
                            'code'=>$code
                        ],[
                            'etudiant_id'=>$etudiant_id,
                            'bourse_id'=>$bourse,
                    ]);
                    
                    $applica = Application::where('code',$code)->first()->id;
                    $request->session()->put('id',$applica);

                    flashy()->message('vous avez fait une nouvelle application');
                    return back();
                }
            }
        }else {
            $etude = EtudiantStory::updateOrInsert(['passport_number'=>$passport_number],[
                'user_id'=>$user_id,
                'family_name'=>$family_name,
                'given_name'=>$given_name,
                'birthdate'=>$birthdate,
                'birthplace'=>$birthplace,
                'passport_number'=>$passport_number,
                'passport_expire'=>$passport_expire,
                'nationality'=>$nationality,
                'gender'=>$gender,
                'marital_status'=>$marital_status,
                'occupation'=>$occupation,
                'affiliated'=>$affiliated,
                'highest_degree'=>$highest_degree,
                'relligion'=>$relligion,
                'hobbies'=>$hobbies,
                'is_in_china'=>$is_in_china,
                'studied_china'=>$studied_china,
                'pays'=>$pays,
                'ville'=>$ville,
                'adresse'=>$adresse,
                'code_postal'=>$code_postal,
                'mobile'=>$mobile
            ]);
            $etudiantE = EtudiantStory::where('passport_number',$passport_number)->first()->id;
            $request->session()->put('etudiant',$etudiantE);

            
            if(!is_null(session('id'))){
                flashy()->message('application existe déjà');
                return back();
            }else{
                $date = Carbon::now();

                $bourse = session('bourse');
                if (is_null($bourse)) {
                    return back();
                } else {

                    $code = $request->passport_number.'-'.$date->format('YMD').'-'.'E'.$request->user_id.'-'.'B'.$bourse;
                    $etudiant_id = $etudiantE;
                    $application = Application::updateOrInsert(
                        [
                            'code'=>$code
                        ],[
                            'etudiant_id'=>$etudiant_id,
                            'bourse_id'=>$bourse,
                    ]);

                    
                    $applica = Application::where('code',$code)->first()->id;
                    $request->session()->put('id',$applica);
                   

                    flashy()->message('vous avez fait une nouvelle application');
                    return back();
                }
            }
        }
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

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateEtudiantBackgroundFormRequest $request, $id)
    {
        $story = EtudiantStory::findOrfail($id); 
        $story->update($request->only('contact_name', 'contact_relationship', 'contact_occupation', 'contact_adress', 'contact_tel', 'contact_email', 'pere_name', 'pere_occupation', 'pere_adress', 'pere_tel', 'pere_email', 'mere_name', 'mere_occupation', 'mere_adress', 'mere_tel', 'mere_email', 'education_1_institutition', 'education_1_option', 'education_1_degree', 'education_1_start', 'education_1_end', 'education_2_institutition', 'education_2_option', 'education_2_degree', 'education_2_start', 'education_2_end', 'education_3_institutition', 'education_3_option', 'education_3_degree', 'education_3_start', 'education_3_end', 'work_institutition', 'work_post', 'work_categori', 'work_start', 'work_end'));

        flashy()->message('informations etudes enregistré avec succès');
        if(!is_null(session('id'))){
            flashy()->message('application existe déjà');
            return back();
        }else{
            $application = new Application();

            $bourse = session('bourse');
            if (is_null($bourse)) {
                flashy()->error('Avant de continuer veuillez selectionner une bourse');
                return redirect(route('bourses.liste'));
            } else {
                $this->application(Request $request);
                
                flashy()->message('vous avez fait une nouvelle application');
                return back();
            }
        }
        flashy()->message('informations etudes enregistré avec succès');
        return back();
    }

    public function application(Request $request)
    {
        $passport = EtudiantStory::where('id',$request->background)->first()->passport_number;
        $code = $request->passport_number.'-'.$date->format('YMD').'-'.'E'.$request->user_id.'-'.'B'.$bourse;
        $application->code = $code;
        $etudiant_id = session('etudiant');
        $application->etudiant_id = $etudiant_id;
        $application->bourse_id = $bourse;
        $application->save();

                
        $applica = Application::where('code',$code)->first()->id;
        $request->session()->put('id',$applica);

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
