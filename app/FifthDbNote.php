<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FifthDbNote extends Model
{
    //
    public function fifthdbcourse()
    {
        return $this->belongsTo('App\FifthDbCourse');
    }
}
