<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;
use DB;
use App\User;
use App\Task;

class UsersController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function showIndex()
	{
		$keyword = \Request::get('search'); //<-- we use global request to get the param of URI
		// $keyword = 'yihan';

		$users = User::where('name','like','%'.$keyword.'%')
		->orderBy('name')
		->paginate(20);

		return view('auth.userindex')->withUsers($users)->withKeyword($keyword);  
	}


	public function showAvatarPage()
	{
      // allows user to choose avatar
		$user = Auth::user();
		$avatar = $user->avatar;
		return view('auth.setavatar')->withAvatar($avatar);
	}

	public function store(Request $request)
	{
		$this->validate($request, [
			'image' => 'required'
			]);

		$uid = Auth::id();
		$imageName = $uid . '.' . $request->file('image')->getClientOriginalExtension();

		$request->file('image')->move(
			'img/avatars/', $imageName
			);

		DB::table('users')->where('id', $uid)->update(['avatar' => $imageName]);

		Session::flash('flash_message', 'New avater is set!');

		return redirect()->back();

	}

	public function storePreset(Request $request)
	{
		$imageName = $request->input('preset');

		DB::table('users')->where('id', Auth::id())->update(['avatar' => $imageName]);

		Session::flash('flash_message', 'New avater is set!');

		return redirect()->back();

	}
	public function show($id)
	{

		$tasks = Task::where('userid', '=', $id)->get();

		return view('auth.userpage')->withId($id)->withTasks($tasks);
	}

}
