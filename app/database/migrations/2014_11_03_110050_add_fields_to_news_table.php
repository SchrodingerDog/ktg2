<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddFieldsToNewsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('news', function(Blueprint $table)
		{
			$table->string('title');
			$table->text('body');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('news', function(Blueprint $table)
		{
			$table->dropColumn('title');
			$table->dropColumn('body');
		});
	}

}
