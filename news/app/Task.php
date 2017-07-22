<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /**
     * Fillable fields
     * 
     * @var array
     */
    protected $fillable = [
    'title',
    'description',
    'url',
    'userid',
    'tagid'
    ];

    public static $storevalid = array( 
    	'title' => 'required', 
    	'description' => 'required', 
    	'url' => 'required',
    	);

    public function likes()
    {
    	return $this->hasMany('App\Like','storyid');
    }

    public function tags()
    {
      return $this->belongsToMany('App\Tag')->withTimestamps();
    }

    public function getTagListAttribute()
    {
      return $this->tags->pluck('id')->all();
    }
  }
