<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FourthDbPastQuestion extends Model
{
    //
    public function fourthdbcourse()
    {
        return $this->belongsTo('App\FourthDbCourse');
    }
}
