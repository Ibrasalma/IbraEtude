<?php 

namespace App\Models\Traits;

trait ApplicationRoutable
{
	public function getRouteKeyName()
    {
    	return 'code';
    }

}