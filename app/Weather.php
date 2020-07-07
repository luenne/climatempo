<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Locale;

class Weather extends Model
{

    protected $table = 'weather';
    /**
     * Get Locale id.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function locale()
    {
        return $this->belongsTo(Locale::class, 'locale_id');
    }
}
