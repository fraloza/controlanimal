<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDetObrasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('detobras', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('idobra')->unsigned();
			$table->string('imagen', 45);
			$table->tinyInteger('estado')->default(1);
			$table->foreign('idobra')->references('id')->on('obras');
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
		Schema::drop('detobras');
	}

}
