<?php

namespace App\Models\Traits;

use Carbon\Carbon;
use App\Models\EtudiantStory;
use Illuminate\Support\Str;


trait Applicable
{
	protected static function boot()
    {
    	parent::boot();

    	static::creating(function($application){

    		$date = Carbon::now();

            $etudiantStory = EtudiantStory::whereId($application->etudiant_id)->first();

    		$application->code = Str::slug($etudiantStory->nationality.''.$date->format('YM').'E'.$etudiantStory->user_id.'B'.session('bourse'));
    	});
    }
}
