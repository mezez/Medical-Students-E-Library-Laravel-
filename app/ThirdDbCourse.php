<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThirdDbCourse extends Model
{
    //
    protected $table = 'thirddbcourses';
    //
    public function thirddbnotes()
    {
        return $this->hasMany('App\ThirdDbNote');
    }
    public function thirddbpastquestions()
    {
        return $this->hasMany('App\ThirdDbPastQuestion');
    }
    public function thirddbvideos()
    {
        return $this->hasMany('App\ThirdDbVideo');
    }
}
