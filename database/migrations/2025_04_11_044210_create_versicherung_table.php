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
        Schema::create('versicherung', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('typ', ['gesetzlich', 'private'])-> default('gesetzlich');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('versicherung');
    }
};
