<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Controller;
use Closure;
use App\Models\PhotoProfil;
use App\Models\EtudiantStory;
use App\Models\Application;

class ApplicationEtape1
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
        $controller = new Controller();
        $diplome = $controller -> enumerer('etudiant_stories','highest_degree');
        $bourse = session('bourse');
        $etudiant = session('etudiant');
        $fichier = PhotoProfil::where('user_id',auth()->user()->id)->first();
        $user = auth()->user()->id;
        if (!is_null($etudiant)) {
            $story = EtudiantStory::where('id',session('etudiant'))->first();
            
            $fichier = image($fichier);

            return redirect(route('application_step1'));
            
        }
        if (!is_null(session('id'))) {
            $appli = Application::where('id',session('id'))->first();
            $story = EtudiantStory::where('id',$appli->id)->first();
            if(is_null($fichier)){
                $fichier = 'ib-logo.png';
                return view('users.application_step1',compact('fichier','story','diplome','user','bourse'));
            }else{
                $fichier = image($fichier);

                return view('users.application_step1',compact('fichier','story','diplome','user','bourse'));
            }
        }

            
        return $next($request);
    }
}
