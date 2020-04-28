<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\NameRoutable;
use App\Models\Traits\Namable;

class Bourse extends Model
{
    protected $fillable=['frais','duree','tuition','accomodation','categorie','programme_id','university_id','date_entree','stipend','revue','nbre_place','detail'];

    use NameRoutable; use Namable;

    public function programme()
    {
    	return $this->belongsTo(Programme::class);
    }
    public function university()
    {
    	return $this->belongsTo(University::class);
    }
    public function avis()
    {
        return $this->hasMany('App\Models\Avi','bourse_id','id');
    }
    public function mensualité()
    {
        return $this->stipend==0;
    }

}
