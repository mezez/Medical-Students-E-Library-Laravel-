<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FifthMbVideo extends Model
{
    //
    public function fifthmbcourse()
    {
        return $this->belongsTo('App\FifthMbCourse');
    }
}
