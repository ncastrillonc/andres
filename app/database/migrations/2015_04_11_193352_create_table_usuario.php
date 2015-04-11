<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUsuario extends Migration {


	public function up()
	{
		Schema::create('usuario', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nombre');
			$table->string('correo');      
			$table->string('password');    
      $table->timestamps();    
		});
		Schema::create('publicacion', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nombre');
			$table->string('correo');      
			$table->string('password');    
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
		Schema::drop('me_gusta');
		Schema::drop('publicacion');
		Schema::drop('usuario');
	}

}
