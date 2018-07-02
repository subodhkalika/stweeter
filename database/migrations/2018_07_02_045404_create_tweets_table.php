<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTweetsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 */
	public function up()
	{
		Schema::create('tweets', function (Blueprint $table) {
			$table->increments('id');
			$table->string('tweet_desc');
			$table->integer('user_id')->unsigned()->index();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 */
	public function down()
	{
		Schema::dropIfExists('tweets');
	}
}
