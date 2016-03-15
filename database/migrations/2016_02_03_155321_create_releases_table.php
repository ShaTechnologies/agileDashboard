<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReleasesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('releases', function(Blueprint $table)
		{
			$table->integer('project_id')->unsigned();
			$table->dateTime('release_date_time');
			$table->integer('responsible_prj_mgr_id')->unsigned();

			$table->primary(['project_id', 'release_date_time']);

			$table->foreign('project_id')->references('project_id')->on('Projects');
			$table->foreign('responsible_prj_mgr_id')->references('id')->on('users');
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
		Schema::drop('releases');
	}

}
