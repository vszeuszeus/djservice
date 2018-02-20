<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = [];

    public function files()
    {
        return $this->hasMany('App\File');
    }

    public function user()
    {
        $this->belongsTo('App\User');
    }

    public function getLatest(){
        $this->with('user', 'files')->get();
    }
}
