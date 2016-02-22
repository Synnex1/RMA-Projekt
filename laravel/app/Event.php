<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'Event';

    public function user()
    {
    	return $this->belongsTo('app\User');
    }
}
