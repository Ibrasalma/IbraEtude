<?php 

namespace App\Models\Traits;

use Illuminate\Support\Str;
use App\Models\Programme;
use App\Models\University;

trait Namable
{
	protected static function boot()
    {
    	parent::boot();

    	static::creating(function($bourse){
            $programme = Programme::whereId($bourse->programme_id)->first();
            $domaine = $programme->domaine;
            $diplome = $programme->degree;
            $university = University::whereId($bourse->university_id)->first();
            $code = $university->code;
    		$chaine = $bourse->categorie.'-'.$domaine.'-'.$diplome.'-'.$code;

            $bourse->name = Str::slug($chaine);
    	});

    	static::updating(function($bourse){
    		$programme = Programme::whereId($bourse->programme_id)->first();
            $domaine = $programme->domaine;
            $diplome = $programme->degree;
            $university = University::whereId($bourse->university_id)->first();
            $code = $university->code;
            $chaine = $bourse->categorie.'-'.$domaine.'-'.$diplome.'-'.$code;

            $bourse->name = Str::slug($chaine);
    	});
    }
}