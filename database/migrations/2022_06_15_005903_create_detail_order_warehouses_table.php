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
        Schema::create('detail_order_warehouses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_warehouses_id')->constrained('order_warehouses');  
            $table->foreignId('product_id')->constrained('products'); 
            $table->unsignedInteger('quantity');                 
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
        Schema::dropIfExists('detail_order_warehouses');
    }
};
