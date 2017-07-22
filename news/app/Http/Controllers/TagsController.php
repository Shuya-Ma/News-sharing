<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TagsController extends Controller
{
  public function showByTag($tagid)
	{

		$tasks = Task::where('tagid','=', $tagid);

		return view('tags.index')->withTasks($tasks)->withTagid($tagid);  
	}
}
