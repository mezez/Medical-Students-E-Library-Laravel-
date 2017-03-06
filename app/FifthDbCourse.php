<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FifthDbCourse extends Model
{
    //
    protected $table = 'fifthdbcourses';
    //
    public function fifthdbnotes()
    {
        return $this->hasMany('App\FifthDbNote');
    }
    public function fifthdbpastquestions()
    {
        return $this->hasMany('App\FifthDbPastQuestion');
    }
    public function fifthdbvideos()
    {
        return $this->hasMany('App\FifthDbVideo');
    }
}
