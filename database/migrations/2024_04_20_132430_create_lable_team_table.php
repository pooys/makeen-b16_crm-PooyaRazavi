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
        Schema::create('lable_team', function (Blueprint $table) {

            $table->id();
            $table->unique('team_id');
            $table->unsignedBigInteger('team_id');
            $table->unique('lable_id');
            $table->unsignedBigInteger('lable_id');
            $table->timestamps();
    
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lable_team');
    }
};
