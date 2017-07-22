<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Like;
use DB;

class PagesController extends Controller
{
  //
	public function home()
	{
		$tasks = Task::all();
		$likes = Like::all();

		return view('pages.home')->withTasks($tasks)->withLikes($likes);
	}

}
