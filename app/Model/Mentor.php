<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Mentor extends Model
{
    public function projects(){
        return $this->hasMany('App\Model\MentorProjects');
    }
}
