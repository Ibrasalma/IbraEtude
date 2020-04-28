<?php

namespace App\Http\Middleware;
use App\Models\EtudiantStory;
use App\Models\Application;

use Closure;

class Background
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
        $b = session('bourse');
        return $next($request);

        $etudiant = EtudiantStory::where('user_id',auth()->user()->id)->get();
        foreach ($etudiant as $value) {
            $nom = $value->family_name.' '.$value->given_name;
            $identifiantEtudiant = $value->id;
            $request->session()->put('nom', $nom);
            $application = Application::where('etudiant_id',$identifiantEtudiant)->get();
            foreach ($application as $e) {
                $bourse = $e->bourse_id;
                if ($bourse==$b) {
                    $identifiantEtudiant = $e->etudiant_id;
                    $request->session()->put('idStudent',$identifiantEtudiant);
                    $id = $e->id;
                    $request->session()->put('id', $id);
                    $code = $e->code;
                    $request->session()->put('code', $code);
                    $status = $e->statut;
                    $request->session()->put('status', $status);
                    $date = $e->updated_at;
                    $request->session()->put('date', $date);
                    return redirect(route('etudiant.liste.bourse'));
                } else {
                    return redirect(route('students.liste'));
                }
            }
        }
        
    }
}
