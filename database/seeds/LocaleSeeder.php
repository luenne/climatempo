<?php

use Illuminate\Database\Seeder;
use App\Locale;

class LocaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get(base_path('data/locales.json'));
        $data = json_decode($json);

        foreach($data as $obj) {
            Locale::create(array(
                'id'         => $obj->id, 
                'name'       => $obj->name,
                'state'      => $obj->state,
                'latitude'   => $obj->latitude,
                'longitude'  => $obj->longitude
            ));
        }
    }
}
