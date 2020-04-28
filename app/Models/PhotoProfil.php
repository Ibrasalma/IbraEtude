<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhotoProfil extends Model
{
    protected $fillable = [
        'user_id', 'group_id', 'filename', 'extension', 'filesize', 'location'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
