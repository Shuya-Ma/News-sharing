<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Comment extends Model
{
    /**
     * Fillable fields
     * 
     * @var array
     */
    protected $fillable = [
    'content',
    'userid',
    'storyid'
    ];

    public static $storevalid = array( 
    	'content' => 'required'  
    	);

    public function owner()
    {
    	return $this->belongsTo('App\User', 'userid');
    }

  }
