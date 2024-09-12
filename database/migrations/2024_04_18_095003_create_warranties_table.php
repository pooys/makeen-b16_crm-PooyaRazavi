<?php

use App\Models\warranty;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('warranties', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->date('started_at');
            $table->date('ended_at');
//            $table->index('product_id');
            $table->unsignedBigInteger('product_id');
//            $table->foreignIdFor(warranty::class,'product_id')->constrained()->cascadeOnDelete();?
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('warranties');
    }
};
