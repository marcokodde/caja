<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('full_name', 80);
			$table->string('email')->null();
			$table->string('address', 60)->null();
			$table->date('start')->null();
            $table->date('end')->null();
            $table->timestamp('date_reserve')->null();
			$table->string('phone', 15)->null();
            $table->string('negocio', 15)->null();
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
        Schema::dropIfExists('usuarios');
    }
}
