<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['id', 'name', 'state_id', 'state_code', 'country_id', 'country_code',
                            'latitude', 'longitude', 'flag', 'wikiDataId'];


}
