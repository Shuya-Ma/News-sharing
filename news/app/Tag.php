<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

	protected $fillable = [
		'tagname'
	];

  /**
  * Associates the task/story with the tag by ids
  *
  */
	public function tasks()
	{
		return $this->belongToMany('App\Task');
	}
	
}
