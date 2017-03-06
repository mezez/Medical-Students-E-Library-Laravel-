<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SecMbVideo extends Model
{
    //
    public function secmbcourse()
    {
        return $this->belongsTo('App\SecMbCourse');
    }
}
