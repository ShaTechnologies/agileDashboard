<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserstoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('userstories', function(Blueprint $table)
		{
			$table->increments('user_story_id');
			$table->text('user_story');
			$table->integer('project_id')->unsigned();

			$table->foreign('project_id')->references('project_id')->on('Projects');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('userstories');
	}

}
