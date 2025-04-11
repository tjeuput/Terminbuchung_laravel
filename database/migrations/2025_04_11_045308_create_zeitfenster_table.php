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
        Schema::create('zeitfenster', function (Blueprint $table) {
            $table->id();
            $table->foreignId('behandler_id')->constrained('behandler')->onDelete('cascade');
            $table->date('datum');
            $table->time('start_zeit');
            $table->time('end_zeit');
            $table->boolean('ist_verfuegbar')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('zeitfenster');
    }
};
