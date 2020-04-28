<?php 

namespace App\Models\Traits;

use Illuminate\Support\Str;
use Illuminate\Support\Arr;

trait UserNamable
{
	protected static function boot()
    {
    	parent::boot();

    	static::creating(function($user){
    		$username = $user->email;
            $username = Str::before($username,'@');
            $user->username = $username;

    	});

    	static::updating(function($user){
    		$username = $user->email;
            $username = Str::before($username,'@');
            $user->username = $username;
    	});
    }
}