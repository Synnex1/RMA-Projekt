<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'Member';

    public function events()
    {
    	return $this->hasMany('app\Event');
    }

    public function users()
    {
    	return $this->hasMany('app\User');
    }
}
