<?php 

namespace App\Models\Traits;

use Illuminate\Support\Str;
use Illuminate\Support\Arr;

trait Codable
{
	protected static function boot()
    {
    	parent::boot();

    	static::creating(function($university){
    		$converted= '';
    		$chaine = $university->name;
    		/*$string = Str::of($chaine)->trim('of');
    		$chaine = Str::of($chaine)->replace('and', '');
    		$chaine = Str::of($chaine)->replace('of', '');*/
    		$chaine = Str::replaceFirst('of','',$chaine);
    		$chaine = Str::replaceFirst('and','',$chaine);
    		$chaine = explode(' ', $chaine);
    		for ($i = count($chaine); $i >0 ; $i--) {
    			$ma_chaine = $chaine[$i-1];

    			$converted = Str::substr($ma_chaine, 0, 1).''.$converted;
    			
    		}
    		$university->code=$converted;
    	});

    	static::updating(function($university){
    		
    		$converted= '';
    		$chaine = $university->name;
    		$chaine = Str::replaceFirst('of','',$chaine);
    		$chaine = Str::replaceFirst('and','',$chaine);
    		$chaine = explode(' ', $chaine);
    		for ($i = count($chaine); $i >0 ; $i--) {
    			$ma_chaine = $chaine[$i-1];

    			$converted = Str::substr($ma_chaine, 0, 1).''.$converted;
    			
    		}
    		$university->code=$converted;
    	});
    }
}