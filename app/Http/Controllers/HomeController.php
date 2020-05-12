<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\PhotoProfil;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $utilisateur = User::where('id',auth()->user()->id)->first();
        $utilisateur = $utilisateur->droit_id;
        //$contains = Str::contains($utilisateur, 'admin');
        if ($utilisateur==1) {
            return view('admin.index');
        } else {
            $fichier = PhotoProfil::where('user_id',auth()->user()->id)->orderBy('id','desc')->first();
            if(is_null($fichier)){
                $fichier = 'ib-logo.png';
                return view('users.home',compact('fichier'));
            }

            $fichier = $fichier->location;

            $fichier = Str::after($fichier, 'public/');

            $fichier = Storage::url($fichier);
            

            return view('users.home',compact('fichier'));
        }
        
    }
}
