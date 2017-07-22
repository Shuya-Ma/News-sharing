<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Like;

class LikesController extends Controller
{
	/**
	 * Like a story
	 * @return Response
	 */
	public function store(Request $request)
	{
	    //validate input
		$this->validate($request, [
			'userid' => 'required',
			'storyid' => 'required'
			]);
		$input = $request->all();

		$userid = Auth::id();
		$storyid = $request->input('storyid');

		Like::create(['userid' => $userid, 'storyid' => $storyid]);

		return redirect()->back();
	}
	public function unlike($userid, $storyid)
	{

    	$like = new Like;
    	$like->where('userid', $userid)->where('storyid', $storyid)->firstOrFail()->delete();

    	return redirect()->back();
	}
}
