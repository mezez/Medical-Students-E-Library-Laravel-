<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FifthMbCourse extends Model
{
    //
    protected $table = 'fifthmbcourses';
    //
    public function fifthmbnotes()
    {
        return $this->hasMany('App\FifthMbNote');
    }
    public function fifthmbpastquestions()
    {
        return $this->hasMany('App\FifthMbPastQuestion');
    }
    public function fifthmbvideos()
    {
        return $this->hasMany('App\FifthMbVideo');
    }
}
