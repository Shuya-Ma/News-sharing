<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Tag;
use Session;
use Auth;
use DB;

class TasksController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('filterByTag');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $uid = Auth::id();

        $tasks = Task::where('userid', '=', $uid)->get();

        return view('tasks.index')->withTasks($tasks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $tags = Tag::pluck('tagname', 'id');
        return view('tasks.create')->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate input
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'url' => 'required|active_url'
            ]);
        // adding news to database
        $input = $request->all();

        $title = $request->input('title');
        $description = $request->input('description');
        $url = $request->input('url');

        $task = new Task;
        $task->title = $title;
        $task->description = $description;
        $task->url = $url;
        $task->userid = Auth::id();
        $task->save();

        $task->tags()->attach($request->input('tag_list'));

        Session::flash('flash_message', 'Story successfully added!');

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::findOrFail($id);

        return view('tasks.show')->withTask($task);    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tags = Tag::pluck('tagname', 'id');
        $task = Task::findOrFail($id);

        return view('tasks.edit')->withTask($task)->withTags($tags);
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
        $task = Task::findOrFail($id);

        $this->validate($request, [
            'title' => 'required',
            'description' => 'required'
            ]);

        $input = $request->all();

        $task->fill($input)->save();

        $task->tags()->sync($request->input('tag_list'));

        Session::flash('flash_message', 'Task successfully added!');

        return redirect()->back();
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
        $task = Task::findOrFail($id);

        $task->delete();

        Session::flash('flash_message', 'Task successfully deleted!');

        return redirect()->route('tasks.index');
    }

    public function filterByTag($id)
    {
        $tasks = Task::whereHas('tags', function($query) use ($id) {
            $query->where('id', '=', $id);
        })->get();

        return view('tasks.filtered')->withTasks($tasks);
    }
}
