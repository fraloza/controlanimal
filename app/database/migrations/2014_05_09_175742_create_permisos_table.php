<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePermisosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('permisos', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('idperfil')->unsigned();
			$table->integer('idmodulo')->unsigned();
			$table->tinyInteger('estado')->default(1);
			$table->foreign('idperfil')->references('id')->on('perfils');
			$table->foreign('idmodulo')->references('id')->on('modulos');
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
		Schema::drop('permisos');
	}

}
