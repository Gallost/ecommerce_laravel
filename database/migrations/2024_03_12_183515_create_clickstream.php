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
        Schema::create('clickstream', function (Blueprint $table) {
            $table->bigIncrements('click_id');
            $table->string('target');
            $table->string('click_page');
            $table->string('ip');
            $table->string('loc')->nullable();
            $table->string('geoloc')->nullable();
            $table->string('device');
            $table->bigInteger('user');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clickstream');
    }
};
