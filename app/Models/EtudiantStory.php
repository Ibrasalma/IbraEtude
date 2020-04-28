<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EtudiantStory extends Model
{

	protected $fillable = ['user_id','bourse_id','given_name','family_name','birthdate','birthplace','passport_number','passport_expire','nationality','gender','marital_status','occupation','affiliated','highest_degree','relligion','hobbies','is_in_china','studied_china','pays','ville','adresse','code_postal','mobile'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function applications()
    {
    	return $this->hasMany('App\Models\Application','etudiant_id','id');
    }
}
