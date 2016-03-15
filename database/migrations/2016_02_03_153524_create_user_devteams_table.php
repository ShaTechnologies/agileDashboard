<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserDevteamsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_devteams', function(Blueprint $table)
		{
			$table->string('dev_team_name',50);
			$table->integer('id')->unsigned();

			$table->primary(['dev_team_name', 'id']);
			$table->foreign('dev_team_name')->references('dev_team_name')->on('devteams');
			$table->foreign('id')->references('id')->on('users');
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
		Schema::drop('user_devteams');
	}

}
