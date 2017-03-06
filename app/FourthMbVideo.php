<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FourthMbVideo extends Model
{
    //
    public function fourthmbcourse()
    {
        return $this->belongsTo('App\FourthMbCourse');
    }
}
