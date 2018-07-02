<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tweet;

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
	public function index(Request $request)
	{
		$tweets = $request->user()->tweets()->get();

		return view('tweets', [
			'tweets' => $tweets,
		]);
	}

	public function store(Request $request)
	{
		$this->validate($request, [
			'tweet_desc' => 'required|max:255',
		]);

		$x = $request->user()->tweets()->create([
			'tweet_desc' => $request->tweet_desc,
		]);

		return redirect('/tweets');
	}

	/**
	* Delete Tweet
	*/
	public function destroy(Tweet $tweet)
	{
		$tweet->delete();

		return redirect('/tweets');
	}
}
