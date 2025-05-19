<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('frontend_team_items', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('name');
            $table->string('designation');
            $table->string('social_icon_one');
            $table->string('social_link_one');
            $table->string('social_icon_two')->nullable();
            $table->string('social_link_two')->nullable();
            $table->string('social_icon_three')->nullable();
            $table->string('social_link_three')->nullable();
            $table->string('social_icon_four')->nullable();
            $table->string('social_link_four')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('frontend_team_items');
    }
};
