<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = [];

    public function files()
    {
        return $this->hasMany('App\File', 'project_id');
    }

    public function user()
    {
        $this->belongsTo('App\User', 'user_id');
    }

    public function getLatest(){
        $this->with('user', 'files')->get();
    }
}
