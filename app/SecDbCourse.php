<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SecDbCourse extends Model
{
    //
    protected $table = 'secdbcourses';
    //
    public function secdbnotes()
    {
        return $this->hasMany('App\SecDbNote');
    }
    public function secdbpastquestions()
    {
        return $this->hasMany('App\SecDbPastQuestion');
    }
    public function secdbvideos()
    {
        return $this->hasMany('App\SecDbVideo');
    }
}
