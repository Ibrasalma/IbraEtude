<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Application;
use App\Models\EtudiantStory;
use App\Models\Bourse;
use Illuminate\Support\Str;
use Illuminate\Routing\Route;

class GererBourse
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
        if (Str::contains($request->statut,'accepte')) {
            $appli = Application::where('statut','accepte')->orderBy('updated_at','desc')->first();
            $id = $appli->etudiant_id;
            $bourse = EtudiantStory::find($id)->bourse;
            $bourse_id = $bourse->id;
            $place = $bourse->nbre_place - 1;
            
            Bourse::where('id',$bourse_id)->update(['nbre_place'=>$place]);
        }
        
        return $next($request);
    }
}
