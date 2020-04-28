<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    public function topic()
    {
        return $this->belongsTo('App\Models\Topic');
    }
}
