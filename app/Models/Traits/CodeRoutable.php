<?php 

namespace App\Models\Traits;

trait CodeRoutable
{
	public function getRouteKeyName()
    {
    	return 'code';
    }

}