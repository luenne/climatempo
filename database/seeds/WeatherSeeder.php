<?php

use Illuminate\Database\Seeder;
use App\Weather;

class WeatherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get(base_path('data/weather.json'));
        $data = json_decode($json);

        foreach($data as $obj) {
            $locale_id = $obj->locale->id;
            foreach($obj->weather as $weather) {
                Weather::create(array(
                    'locale_id'      => $locale_id,
                    'date'           => $weather->date,
                    'text'           => $weather->text,
                    'max'            => $weather->temperature->max,
                    'min'            => $weather->temperature->min,
                    'probability'    => $weather->rain->probability,
                    'precipitation'  => $weather->rain->precipitation
                ));
            }
        }
    }
}
