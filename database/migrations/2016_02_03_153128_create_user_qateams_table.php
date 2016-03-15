<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserQateamsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_qateams', function(Blueprint $table)
		{
			$table->string('qa_team_name',50);
			$table->integer('id')->unsigned();

			$table->primary(['id','qa_team_name']);

			$table->foreign('id')->references('id')->on('users');
			$table->foreign('qa_team_name')->references('qa_team_name')->on('qateams');
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
		Schema::drop('user_qateams');
	}

}
