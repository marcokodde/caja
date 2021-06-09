<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerIdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_ids', function (Blueprint $table) {
            $table->id();
            $table->string('folio',15);
            $table->foreignId('customer_id')->constrained();
            $table->string('identification_id')->nullable();
            $table->timestamp('expire_at');
            $table->text('image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_ids');
    }
}
