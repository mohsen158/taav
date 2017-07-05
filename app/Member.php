<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Member extends Model 
{

    protected $table = 'members';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('name', 'status');

    public function steps()
    {
        return $this->belongsToMany('App\Step')->withPivot('arrivalTime',`startTime`, `endTime`, `status`);;
    }

}