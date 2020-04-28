<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Programme extends Model
{
    protected $fillable=['name','duration','degree','language','details','requirement','domaine','tuition','accomodation'];

    public function bourses()
    {
    	return $this->hasMany('App\Models\Bourse','programme_id','id');
    }
}
