<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FifthDbVideo extends Model
{
    //
    public function fifthdbcourse()
    {
        return $this->belongsTo('App\FifthDbCourse');
    }
}
