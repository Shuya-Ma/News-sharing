<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    //
	  protected $fillable = ['userid', 'storyid'];
    
    public function owner()
    {
        return $this->belongsTo('App\Task', 'storyid');
    }
}
