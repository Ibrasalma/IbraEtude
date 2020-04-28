<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Codable;
use App\Models\Traits\CodeRoutable;

class University extends Model
{
	
    protected $fillable=['name','slogan','ville','website','wechat','ranking','province','details'];

	use Codable; use CodeRoutable;
    
    public function bourses()
    {
    	return $this->hasMany('App\Models\Bourse','university_id','id');
    }

    public function galeries()
    {
    	return $this->hasMany(Galerie::class,'university_id','id');
    }

}
