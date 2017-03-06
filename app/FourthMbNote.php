<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FourthMbNote extends Model
{
    //
    public function fourthmbcourse()
    {
        return $this->belongsTo('App\FourthMbCourse');
    }
}
