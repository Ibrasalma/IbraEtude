<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Droit extends Model
{
	protected $fillable=['signification'];

	public function users()
	{
		return $this->hasMany('App\Models\User','droit_id','id');
	}
    
}
