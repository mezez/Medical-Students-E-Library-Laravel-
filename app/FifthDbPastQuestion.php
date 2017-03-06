<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FifthDbPastQuestion extends Model
{
    //
    public function fifthdbcourse()
    {
        return $this->belongsTo('App\FifthDbCourse');
    }
}
