<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Ideator extends Model
{
    public function mentors(){
        return $this->hasMany('App\Model\MentorProjects', 'project_id');
    }
}
