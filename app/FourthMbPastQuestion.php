<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FourthMbPastQuestion extends Model
{
    //
    public function fourthmbcourse()
    {
        return $this->belongsTo('App\FourthMbCourse');
    }
}
