<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable= [
        'avatar', 'user_id', 'facebook', 'about', 'youtube',
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
