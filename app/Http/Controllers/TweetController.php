<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tweet;
use App\User;

class TweetController extends Controller
{
	/**
	* Create a new controller instance.
	*
	*/
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	* Display a list of all of the user's tweets.
	*
	* @param  Request  $request
	* @return Response
	*/
	public function index(Request $request, $id = null)
	{
		if ($id) {
			$user = User::find($id);
			$tweets = $user->tweets()->orderBy('created_at', 'desc')->get();
		} else {
			$tweets = Tweet::orderBy('created_at', 'desc')->get();
		}

		return view('tweets', [
			'tweets' => $tweets,
		]);
	}

	/**
	* create a user's tweets.
	*
	* @param  Request  $request
	*/
	public function store(Request $request)
	{
		$this->validate($request, [
			'tweet_desc' => 'required|max:255',
		]);

		$x = $request->user()->tweets()->create([
			'tweet_desc' => $request->tweet_desc,
		]);

		return redirect('/profile');
	}

	/**
	* Delete Tweet
	*/
	public function destroy(Tweet $tweet)
	{
		$tweet->delete();

		return redirect('/profile');
	}
}
