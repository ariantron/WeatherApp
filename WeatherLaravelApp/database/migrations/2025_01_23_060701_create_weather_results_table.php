<?php

use App\Enums\WeatherType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('weather_results', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->decimal('latitude', 9, 6);
            $table->decimal('longitude', 9, 6);
            $table->enum('weather', WeatherType::values());
            $table->decimal('high_temperature', 5);
            $table->decimal('low_temperature', 5);
            $table->timestamp('sunrise');
            $table->timestamp('sunset');
            $table->date('date');
            $table->timestamps();

            $table->foreign('city_id')
                ->references('id')
                ->on('cities');

            $table->unique([
                'city_id',
                'latitude',
                'longitude',
                'date'
            ], 'weather_results_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('weather_results');
    }
};
