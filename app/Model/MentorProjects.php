<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MentorProjects extends Model
{
    public function project(){
        return $this->belongsTo('App\Model\Ideator', 'project_id');
    }

    public function mentor(){
        return $this->belongsTo('App\Model\Mentor');
    }
}
