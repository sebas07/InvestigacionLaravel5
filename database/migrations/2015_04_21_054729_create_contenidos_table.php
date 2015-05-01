<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContenidosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contenidos', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('titulo')->unique();
            $table->text('descripcion')->nullable();
            $table->integer('id_categoria')->unsigned();

            $table->foreign('id_categoria')
                ->references('id')
                ->on('categorias')->onDelete('cascade');
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
		Schema::drop('contenidos');
	}

}
