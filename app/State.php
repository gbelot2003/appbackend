<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{

    /**
     * @var array
     */
    protected $fillable = ['id', 'name', 'country_id', 'country_code', 'fips_code', 'iso2', 'flag', 'wikiDataId'];
}
