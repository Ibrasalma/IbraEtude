<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galerie extends Model
{
    protected $fillable=['description','university_id','filename', 'extension', 'filesize', 'location'];

    public function university()
    {
    	return $this->belongsTo(University::class);
    }

}
