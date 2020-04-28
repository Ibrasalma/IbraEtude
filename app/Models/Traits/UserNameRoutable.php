<?php 

namespace App\Models\Traits;

trait UserNameRoutable
{
	public function getRouteKeyName()
    {
    	return 'username';
    }

}