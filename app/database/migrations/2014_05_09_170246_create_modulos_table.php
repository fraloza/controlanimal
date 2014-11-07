<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateModulosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('modulos', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('idpadre')->unsigned();
			$table->string('descripcion', 40);
			$table->string('url', 200);
			$table->tinyInteger('estado')->default(1);
			$table->foreign('idpadre')->references('id')->on('modulos');
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
		Schema::drop('modulos');
	}

}
