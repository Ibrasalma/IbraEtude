<?php

if(!function_exists('page_title')){
	function page_title($title){

		$baseTitle = config('app.name') .'- list of artisans';

		return empty($title) ? $baseTitle : sprintf('%s | %s',$title,$baseTitle);
	}
}

if(!function_exists('set_active_route')){
	function set_active_route($route){

		return Route::is($route) ? 'active' : '';
		
	}
}

if(!function_exists('required')){
	function required()
	{
		return '<span style="color:red;">*</span>';
	}
}

if (!function_exists('stipend')) {

	function stipend($bourse)
	{
		$retVal = ($bourse->mensuality) ? 'NON' : 'OUI';
		return $retVal;
	}
}

if (!function_exists('dollar')) {

	function dollar($montant)
	{
		$retVal =$montant/7 ;
		return $retVal;
	}
}

if (!function_exists('est_en_chine')) {
	function est_en_chine($story)
	{
		$retVal = ($story->is_in_china) ? 'OUI' : 'NON';
		return $retVal;
	}
	
}

if (!function_exists('etudie_en_chine')) {
	function etudie_en_chine($story)
	{
		$retVal = ($story->studied_china) ? 'OUI' : 'NON';
		return $retVal;
	}
	
}

if(!function_exists('est_image')){
	function est_image($fichier)
	{
		$retVal = (Str::containsAll($fichier,['.jpg','.png','.gif'])) ? $fichier : 'ib-logo.png';
		return $retVal;
	}
}

if (!function_exists('image')) {
	function image($value)
	{
		$value = $value->location;
        $value = Str::after($value, 'public/');
        $value = Storage::url($value);
		return $value;
	}
}

if (!function_exists('duree_bourse')) {
	function duree_bourse($bourse)
		{
			return $bourse->duree.''.Str::plural(' an',$bourse->duree);	
	}	
}

if (!function_exists('duration')) {
	function duration($duree)
		{
			return $duree.''.Str::plural(' an',$duree);	
	}	
}

if(!function_exists('documentExiste')){
	function documentExiste($value){
		dd($value);
		if (is_null($value)) {
            flashy()->error('Veuillez ajouter le document suivant :'.$value);
        }
        return back();
	}
}
	
if (!function_exists(('upload'))) {
	function upload($value,$request,$dossier)
	{
		$file= $request->file('filename');
        if ($file->isValid()) {
            
            $fileUpload = new $value;
            if (Str::contains($value,'PhotoProfil')) {
            	$fileUpload->user_id = auth()->user()->id;
            } else {
            	$fileUpload->user_id = $request->application;
            }
            $fileUpload->filename = $request->file('filename')->hashName();
            $fileUpload->extension = $request->file('filename')->extension();
            $fileUpload->filesize = $request->file('filename')->getClientSize();
            $filename = Str::slug($fileUpload->filename).'-'.$request->user()->id.'.' .$file->getClientOriginalExtension();
            $fileUpload->location =  $request->file('filename')->storeAs('public/'.$dossier,$filename);

            /*$destinationPath = $dossier.'/avatar_user_'.$request->user()->id;
            $file->move($destinationPath,$filename);
*/
            $fileUpload->save();
 
            

            flashy()->success('Votre fichier a été ajouté avec succès');
 
            //UploadContacts::dispatch($fileUpload, $group)->onQueue('file-uploads');
            //dispatch(new UploadContacts($fileUpload, $group))->onQueue('file-uploads');
        } else {
            flashy()->error('There was a problem uploading your file. Please try again.');
        }
	}
}

if (!function_exists('numberApplication')) {
	function numberApplication(){
		$etudiants = App\Models\EtudiantStory::where('user_id',auth()->user()->id)->get('id');
        foreach ($etudiants as $e){
            $etudiant = $e->id;
            $applications = App\Models\Application::where('etudiant_id',$etudiant)->get('id');
            foreach($applications as $a){
                $number = count($applications);
            }
        }
        return ($number) ?? '';
	}
	
}

if (!function_exists('dateConnection')) {
	function dateConnection($valeur){
		return $valeur->format('d/m/Y');
	}	
}

if (!function_exists('heure')) {
	function heure($valeur){
		return $valeur->format('H:i');
	}	
}

if (!function_exists('format_date')) {
	function format_date($date){
		return Carbon\Carbon::parse($date)->locale('fr')->diffForHumans();
	}
}

if (!function_exists('lienExterne')) {
	function lienExterne($value)
	{
		return Str::after($value,env('APP_URL'));
	}
}
            