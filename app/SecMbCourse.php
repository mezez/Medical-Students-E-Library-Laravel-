<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SecMbCourse extends Model
{

    protected $table = 'secmbcourses';
    //
    public function secmbnotes()
    {
        return $this->hasMany('App\SecMbNote');
    }
    public function secmbpastquestions()
    {
        return $this->hasMany('App\SecMbPastQuestion');
    }
    public function secmbvideos()
    {
        return $this->hasMany('App\SecMbVideo');
    }
}
