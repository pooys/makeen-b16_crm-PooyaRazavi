<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('lable_product', function (Blueprint $table) {
   
            $table->id();
            $table->unique('lable_id');
            $table->unsignedBigInteger('lable_id');
            $table->unique('product_id');
            $table->unsignedBigInteger('product_id');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lable_product');
    }
};
