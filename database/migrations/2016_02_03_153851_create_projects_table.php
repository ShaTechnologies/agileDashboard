<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('projects', function(Blueprint $table)
		{
			$table->increments('project_id'); //automatically adds as a primary key
			$table->string('project_name', 100);
			$table->integer('no_of_user_stories');
			$table->integer('no_of_compl_user_stories');
			$table->integer('project_status'); //*1
			$table->integer('accountant_id')->unsigned();
			$table->integer('manager_id')->unsigned();
			$table->integer('consultant_architect_id')->unsigned();
			$table->string('qa_team_name',50);
			$table->string('dev_team_name',50);

			$table->foreign('accountant_id')->references('id')->on('users');
			$table->foreign('manager_id')->references('id')->on('users');
			$table->foreign('consultant_architect_id')->references('id')->on('users');

			$table->foreign('qa_team_name')->references('qa_team_name')->on('qateams');
			$table->foreign('dev_team_name')->references('dev_team_name')->on('devteams');

			$table->timestamps();

			//*1 -> 0 - pending to be Tested
			//		1 - Testing
			//  	2 - Finished
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('projects');
	}

}
