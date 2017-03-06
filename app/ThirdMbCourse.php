<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThirdMbCourse extends Model
{
    //
    protected $table = 'thirdmbcourses';
    //
    public function thirdmbnotes()
    {
        return $this->hasMany('App\ThirdMbNote');
    }
    public function thirdmbpastquestions()
    {
        return $this->hasMany('App\ThirdMbPastQuestion');
    }
    public function thirdmbvideos()
    {
        return $this->hasMany('App\ThirdMbVideo');
    }
}
