<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThirdMbPastQuestion extends Model
{
    //
    public function thirdmbcourse()
{
    return $this->belongsTo('App\ThirdMbCourse');
}
}
