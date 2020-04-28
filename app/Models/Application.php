<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Applicable;
use App\Models\Traits\ApplicationRoutable;

class Application extends Model
{
    use ApplicationRoutable; use Applicable;
    protected $fillable = ['code','etudiant_id','statut'];

    public function etudiantStory()
    {
    	return $this->belongsTo(EtudiantStory::class);
    }
}
