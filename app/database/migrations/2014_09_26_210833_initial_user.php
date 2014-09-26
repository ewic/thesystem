<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InitialUser extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//First time creation of a users table
		Schema::create('users', function($table) {
			$table->increments('id');
			$table->string('email')->unique();
			$table->string('password');
			$table->string('name');
			$table->integer('emplid');
		});

		//Contact info contains info that would be updated more often
		Schema::create('contactinfo', function($table) {
			$table->integer('id');
			$table->integer('phone');
			$table->string('address');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//Drop the whole table
		Schema::drop('users');
		Schema::drop('contactinfo');
	}

}
