<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Step extends Model 
{

    protected $table = 'steps';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('title', 'duration');
    protected $visible = array('title');

    public function prerequisites()
    {
        return $this->hasMany('App\Step', 'prerequisite');
    }

    public function members()
    {
        return $this->belongsToMany('App\Member');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}