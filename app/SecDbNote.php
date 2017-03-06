<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SecDbNote extends Model
{
    //
    public function secdbcourse()
    {
        return $this->belongsTo('App\SecDbCourse');
    }
}
