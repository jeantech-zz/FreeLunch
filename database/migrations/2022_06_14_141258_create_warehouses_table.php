<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up():void
    {
        Schema::create('warehouses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products');        
            $table->unsignedInteger('quantity');         
            $table->timestamps();
        });
    }

    public function down():void
    {
        Schema::dropIfExists('warehouses');
    }
};
