<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('frontend_product_items', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('name');
            $table->tinyInteger('stock')->default(1);
            $table->decimal('price', 8, 2);
            $table->string('button_name');
            $table->string('button_link');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('frontend_product_items');
    }
};
