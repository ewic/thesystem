<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FirstUser extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//Insert the first user, a super admin.  Also create the super admin table
		DB::table('users')->insertGetId(
			array(	'email' => 'ewicexclamationpoint@gmail.com',
					'password' => MD5('test'),
					'name' => 'Eric Zhang',
					'emplid' => 100194778,)
			);

		Schema::create('app_admin',function($table) {
			$table->integer('id');
		});

		$id = DB::table('users')->where('email','=','ewicexclamationpoint@gmail.com')->pluck('id');

		DB::table('app_admin')->insert(
			array('id' => $id)
			);
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//Drop the first user
		$id = DB::table('users')->where('email','=','ewicexclamationpoint@gmail.com')->pluck('id');

		DB::table('app_admin')->where('id','=',$id)->delete();

		DB::table('users')->where('email','=','ewicexclamationpoint@gmail.com')->delete();
		
	}

}
