<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;
use Session;
use App\Comment;
use App\Task;
use View;

class CommentsController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth', ['except' => 'showPage']);
	}

	public function showPage($id)
	{
		//
    $task = Task::findOrFail($id);

		$comments = DB::table('comments')
		->where('storyid', '=', $id)
		->get();

		// dd($comments);
		// $comments = DB::select('select * from comments');  
		return view('comments.commentPage')->withComments($comments)->withTask($task);


	}

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function storeComment(Request $request)
    {

        //validate input
        $this->validate($request, [
            'commentText' => 'required'
            ]);
        // adding news to database
        $input = $request->all();

        $content = $request->input('commentText');
        $userid = Auth::id();
        $storyid = $request->input('storyid');

        // Task::create($input);
        Comment::create(['content' => $content, 'userid' => $userid, 'storyid' => $storyid]);

        Session::flash('flash_message', 'Comment successfully added!');

        return redirect()->back();

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    	$comment = Comment::findOrFail($id);

    	return view('comments.edit')->withComment($comment);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    	$comment = Comment::findOrFail($id);

    	$this->validate($request, [
    		'content' => 'required'
    		]);

    	$input = $request->all();

    	$comment->fill($input)->save();

    	Session::flash('flash_message', 'Comment successfully modified!');

    	return redirect()->route('getcomments', ['id' => $comment->storyid]);
    	// return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    	$comment = Comment::findOrFail($id);

    	$comment->delete();

    	Session::flash('flash_message', 'Comment successfully deleted!');

    	return redirect()->back();
    }
  }
