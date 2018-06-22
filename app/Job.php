<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    public function admins(){
        return $this->belongsToMany('App\Admin');
    }
}
