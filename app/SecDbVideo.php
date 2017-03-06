<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SecDbVideo extends Model
{
    //
    public function secdbcourse()
    {
        return $this->belongsTo('App\SecDbCourse');
    }
}
