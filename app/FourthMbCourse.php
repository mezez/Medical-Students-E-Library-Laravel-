<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FourthMbCourse extends Model
{
    //
    protected $table = 'fourthmbcourses';
    //
    public function fourthmbnotes()
    {
        return $this->hasMany('App\FourthMbNote');
    }
    public function fourthmbpastquestions()
    {
        return $this->hasMany('App\FourthMbPastQuestion');
    }
    public function fourthmbvideos()
    {
        return $this->hasMany('App\FourthMbVideo');
    }
}
