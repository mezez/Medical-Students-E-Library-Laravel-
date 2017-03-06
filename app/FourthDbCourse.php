<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FourthDbCourse extends Model
{
    //
    protected $table = 'fourthdbcourses';
    //
    public function fourthdbnotes()
    {
        return $this->hasMany('App\FourthDbNote');
    }
    public function fourthdbpastquestions()
    {
        return $this->hasMany('App\FourthDbPastQuestion');
    }
    public function fourthdbvideos()
    {
        return $this->hasMany('App\FourthDbVideo');
    }
}
