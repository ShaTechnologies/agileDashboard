<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDefectsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('defects', function(Blueprint $table)
		{
			$table->increments('defect_id');
			$table->string('title');
			$table->text('description');
			$table->date('raised_date');
			$table->time('raised_time');
			$table->string('attachment_url');
			$table->string('status');
			$table->integer('project_id')->unsigned();
			$table->integer('qa_engineer_id')->unsigned();
			$table->integer('developer_id')->unsigned();
			$table->integer('priority_level');

			$table->foreign('project_id')->references('project_id')->on('Projects');
			$table->foreign('qa_engineer_id')->references('id')->on('users');
			$table->foreign('developer_id')->references('id')->on('users');
			$table->foreign('priority_level')->references('priority_level')->on('prioritylevels');
			$table->timestamps();

			/*
			 * 0 - Not fixed
			 * 1 - Responsed
			 * 2 - Fixed
			 * 3 - Re-assigned
			 * 4 - Re-opened
			 * 5 - Unresponed (Escalade)
			 */
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('defects');
	}

}
