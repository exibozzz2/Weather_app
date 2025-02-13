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
        Schema::table('forecasts', function (Blueprint $table) {
            $table->string("condition");

            $table->foreign("condition")
                ->references("weather_id")
                ->on("cities");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('forecasts', function (Blueprint $table) {
            //
        });
    }
};
