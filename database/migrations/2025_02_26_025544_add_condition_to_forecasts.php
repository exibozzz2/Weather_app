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
            $table->string("condition", 255); // Ensure the same length as "weather" in "cities"
            $table->foreign("condition")->references("weather")->on("cities")->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('forecasts', function (Blueprint $table) {
            $table->dropForeign(['condition']); // Drop foreign key first
            $table->dropColumn('condition'); // Then drop the column
        });
    }
};
