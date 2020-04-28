<?php

namespace App\Http\Middleware;

use Closure;

class ApplicationEtape2
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
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
                    $verify = Application::where('id',$verification->id)->where('bourse_id',$bourse)->first();
                    if (!is_null($verify)) {
                        $application = $verify->id;
                    } else {
                        $application = new Application();
                        $application->etudiant_id = $studentEdu;
                        $application->bourse_id = $bourse;
                        $application->save();
                        
                        if($application->save()){
                            $applica = Application::all()->orderBy('id','desc')->first()->id;
                            $request->session()->put('id',$applica);
                        }
                        $application = Application::where('etudiant_id',$studentEdu)->where('bourse_id',$bourse)->first()->id;  
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
                        $applica = Application::all()->orderBy('id','desc')->first()->id;
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

        return $next($request);
    }
}
