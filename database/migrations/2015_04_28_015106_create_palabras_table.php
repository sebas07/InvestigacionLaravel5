<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePalabrasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('palabras', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('id_contenido')->unsigned();;
            $table->string('palabra');

            $table->foreign('id_contenido')
                ->references('id')
                ->on('contenidos')->onDelete('cascade');
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
		Schema::drop('palabras');
	}

}
