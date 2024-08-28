<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeatherData extends Model
{
    use HasFactory;

    protected $table = 'weather_data';

    protected $primaryKey = 'id';

    protected $keyType = 'int';

    public $timestamps = true;

    protected $fillable = [
        'request_type',
        'request_query',
        'request_language',
        'request_unit',
        'location_name',
        'location_country',
        'location_region',
        'location_timezone_id',
        'location_localtime',
        'current_observation_time',
        'current_temperature',
        'current_weather_code',
        'current_weather_descriptions',
        'current_wind_speed',
        'current_wind_degree',
        'current_wind_dir',
        'current_pressure',
        'current_precip',
        'current_humidity',
        'current_cloudcover',
        'current_feelslike',
        'current_uv_index',
        'current_visibility',
        'current_is_day',
    ];
}

