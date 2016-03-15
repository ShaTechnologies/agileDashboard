<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationemailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('notificationemails', function(Blueprint $table)
		{
			$table->integer('defect_id')->unsigned();
			$table->integer('id')->unsigned();
			$table->integer('status');
			$table->timestamps();

			$table->primary('defect_id');
			$table->foreign('defect_id')->references('defect_id')->on('Defects');
			$table->foreign('id')->references('id')->on('users');

			/*
			 * Status holds data for email sent or not sent
			 * Usage of int is to expand the meaning of status in future
			 * */
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('notificationemails');
	}

}
