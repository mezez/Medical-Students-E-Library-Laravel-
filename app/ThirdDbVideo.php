<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThirdDbVideo extends Model
{
    //
    public function thirddbcourse()
    {
        return $this->belongsTo('App\ThirdDbCourse');
    }
}
