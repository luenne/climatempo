<?php

namespace App;
use App\Weather;

use Illuminate\Database\Eloquent\Model;

class Locale extends Model
{
    protected $table = 'locales';

    /**
     * Get related weather.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function weather()
    {
        return $this->hasMany(Weather::class, 'locale_id');
    }
}