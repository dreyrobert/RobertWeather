<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeatherDataTable extends Migration
{
    /**
     * Execute the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weather_data', function (Blueprint $table) {
            $table->id();
            $table->string('request_type', 50);
            $table->string('request_query', 100);
            $table->string('request_language', 10);
            $table->string('request_unit', 10);

            $table->string('location_name', 100);
            $table->string('location_country', 50);
            $table->string('location_region', 50);
            $table->string('location_timezone_id', 50);
            $table->timestamp('location_localtime');

            $table->time('current_observation_time');
            $table->integer('current_temperature');
            $table->integer('current_weather_code');
            $table->text('current_weather_descriptions')->nullable();
            $table->integer('current_wind_speed');
            $table->integer('current_wind_degree');
            $table->string('current_wind_dir', 10);
            $table->integer('current_pressure');
            $table->integer('current_precip');
            $table->integer('current_humidity');
            $table->integer('current_cloudcover');
            $table->integer('current_feelslike');
            $table->integer('current_uv_index');
            $table->integer('current_visibility');
            $table->boolean('current_is_day');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('weather_data');
    }
}
