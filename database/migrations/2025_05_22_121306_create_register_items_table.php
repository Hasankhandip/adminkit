<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('register_items', function (Blueprint $table) {
            $table->id();
            $table->string('subtitle');
            $table->string('title');
            $table->string('info');
            $table->string('thumb');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations
     */
    public function down(): void {
        Schema::dropIfExists('register_items');
    }
};
