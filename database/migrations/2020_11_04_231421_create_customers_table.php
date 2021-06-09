<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 80);
            $table->string('middle_name', 80)->null();
            $table->string('last_name', 80);
            $table->string('maternal_name', 80)->null();
            $table->date('birthday');
				$table->string('email')->null();
				$table->string('address', 60)->null();
				$table->integer('zipcode')->unsigned()->null();
				$table->string('phone', 15)->null();
				$table->boolean('occupied')->default('0');
            $table->foreignId('country_id')->constrained();
            $table->string('occupation_id')->null();
            $table->string('vip_id')->null();
            $table->string('photo')->null();
            $table->foreignId('user_id')->constrained()->null();
				$table->boolean('active')->default('1');
            $table->integer('black_list')->default('0');
            $table->integer('marked')->default('0');
            $table->boolean('first_time_exceds')->default('0');
			// Las llaves foraneas
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
        Schema::dropIfExists('customers');
    }
}
