<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FifthMbPastQuestion extends Model
{
    //
    public function fifthmbcourse()
    {
        return $this->belongsTo('App\FifthMbCourse');
    }
}
