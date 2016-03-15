<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrioritylevelsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('prioritylevels', function(Blueprint $table)
		{
			$table->integer('priority_level');
			$table->integer('response_time')->unsigned();
			$table->dateTime('expiration_date_time');

			$table->primary('priority_level');
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
		Schema::drop('prioritylevels');
	}

}
