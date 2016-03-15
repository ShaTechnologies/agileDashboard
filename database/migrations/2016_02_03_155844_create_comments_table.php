<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comments', function(Blueprint $table)
		{
			$table->increments('comment_id');
			$table->integer('defect_id')->unsigned();
			$table->string('title');
			$table->date('commented_date');
			$table->time('commented_time');
			$table->text('comment');
			$table->integer('qa_engineer_id')->unsigned();
			$table->timestamps();

			$table->foreign('defect_id')->references('defect_id')->on('Defects');
			$table->foreign('qa_engineer_id')->references('id')->on('users');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('comments');
	}

}
