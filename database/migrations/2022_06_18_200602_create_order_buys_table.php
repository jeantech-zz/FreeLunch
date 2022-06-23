<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_buys', function (Blueprint $table) {
            $table->id();
            $table->string('product_name',60);
            $table->foreignId('order_plates_id')->constrained('order_plates');
            $table->integer('quantity_buys')->nullable();
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
        Schema::dropIfExists('order_buys');
    }
};
