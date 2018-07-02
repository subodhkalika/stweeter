<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['tweet_desc'];

	/**
	 * Get the user that owns the tweet.
	 */
	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
