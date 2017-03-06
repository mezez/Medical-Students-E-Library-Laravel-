<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FifthMbNote extends Model
{
    //
    public function fifthmbcourse()
    {
        return $this->belongsTo('App\FifthMbCourse');
    }
}
