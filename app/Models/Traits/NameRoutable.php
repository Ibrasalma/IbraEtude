<?php 

namespace App\Models\Traits;

trait NameRoutable
{
	public function getRouteKeyName()
    {
    	return 'name';
    }

}