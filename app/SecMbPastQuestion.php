<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SecMbPastQuestion extends Model
{
    //
    public function secmbcourse()
    {
        return $this->belongsTo('App\SecMbCourse');
    }
}
