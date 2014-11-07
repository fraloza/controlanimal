<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePortadasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('portadas', function(Blueprint $table) {
			$table->increments('id');
			$table->string('titulo',200);
			$table->string('efectot',100);
			$table->text('contenido');
			$table->string('efectoc',100);
			$table->string('imagen',30);
			$table->tinyInteger('estado')->default(1);
			$table->tinyInteger('mostrar')->default(0);
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
		Schema::drop('portadas');
	}

}
