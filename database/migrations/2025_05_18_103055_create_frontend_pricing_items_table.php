<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('frontend_pricing_items', function (Blueprint $table) {
            $table->id();
            $table->integer('serial');
            $table->decimal('price', 8, 2);
            $table->string('name');
            $table->string('info_icon_one');
            $table->string('info_name_one');
            $table->string('info_icon_two');
            $table->string('info_name_two');
            $table->string('info_icon_three');
            $table->string('info_name_three');
            $table->string('button_link');
            $table->string('button_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('frontend_pricing_items');
    }
};
