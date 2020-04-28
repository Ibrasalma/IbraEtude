<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Droit;
use App\Models\PhotoProfil;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function userOnlineStatus()
    {
        $users = User::all();

        foreach ($users as $user) {
            if (Cache::has('user-is-online-' . $user->id))
                echo $user->name . " est en ligne. Last seen: " . Carbon::parse($user->last_seen)->diffForHumans() . " <br>";
            else
                echo $user->name . " est horsligne. Last seen: " . Carbon::parse($user->last_seen)->diffForHumans() . " <br>";
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function profil()
    {
        $fichier = PhotoProfil::where('user_id',auth()->user()->id)->first();
        if(is_null($fichier)){
            $fichier = 'ib-logo.png';
            return view('users.profil',compact('fichier'));
        }
        $fichier = $fichier->location;
        $fichier = Str::after($fichier, 'public/');
        $fichier = Storage::url($fichier);
        
        return view('users.profil',compact('fichier'));
    }

    public function index()
    {
        $user=User::paginate(10);
        $titre='user';
        return view('admin.users.liste',compact('user','titre'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$comment = App\Post::find(1)->comments()->where('title', 'foo')->first();
        $utilisateur = Droit::all();
        $user = new User();
        return view('admin.users.create',compact('user','utilisateur'));
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
            'name' => ['required', 'string','max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'droit_id'=>'required',
        ],[
            'name.required'=>'Vous devez entrer un nom',
            'name.string'=>'Le nom doit être en caractère',
            'email.required'=>'Le champ email est requis',
            'email.string'=>'L\'email doit être en caractère',
            'email.email'=>'L\'email doit contenir @ et .',
            'password.required'=>'Le mot de passe est requis',
            'password.min'=>'Le password doit être au minimum 8 caractère',
            'password.confirmed'=>'Le password doit être le même',
        ]);
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'droit_id'=>$request->droit_id,
        ]);
        
        flashy()->message('utilisateur crée avec succès');
        return redirect(route('users.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $utilisateur)
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
        $utilisateur = Droit::all();
        $user = User::findOrFail($id);
        return view('admin.users.update',compact('user','utilisateur'));
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
        $user = User::findOrFail($id);
        $this->validate($request,[
            'name'=>'required|min:3',
            'email'=>'required|email',
            'droit_id'=>'required',
        ]);
        $user->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password,
            'droit_id'=>$request->droit_id
        ]);

        flashy()->success(sprintf("l'utilisateur '%s' a été modifié avec succès",$user->name));
        return redirect(route('users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        flashy()->error(sprintf("l'utilisateur '%s' a été supprimé avec succès",$user->name));
        return redirect(route('users.index'));
    }
}
