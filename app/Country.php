<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{

    protected $fillable = ['id', 'name', 'iso3', 'iso2', 'phonecode', 'capital', 'currency',
                            'native', 'wikiDataId'];
}
