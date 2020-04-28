<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Avi extends Model
{
    protected $fillable = ['user_id','bourse_id','avi','approuved'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
    public function bourse()
    {
    	return $this->belongsTo(Bourse::class);
    }
}
