<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    //
    protected $table ='member_step';
    public function member()
    {
        return $this->belongsTo('App\Member');
    }

    public function step()
    {
        return $this->belongsTo('App\Step');
    }
}
