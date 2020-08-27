<?php

use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('countries')->delete();
        
        \DB::table('countries')->insert(array (
            0 => 
            array (
                'id' => 53,
                'name' => 'Costa Rica',
                'iso3' => 'CRI',
                'iso2' => 'CR',
                'phonecode' => '506',
                'capital' => 'San Jose',
                'currency' => 'CRC',
                'native' => 'Costa Rica',
                'wikiDataId' => '',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 66,
                'name' => 'El Salvador',
                'iso3' => 'SLV',
                'iso2' => 'SV',
                'phonecode' => '503',
                'capital' => 'San Salvador',
                'currency' => 'USD',
                'native' => 'El Salvador',
                'wikiDataId' => '',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 90,
                'name' => 'Guatemala',
                'iso3' => 'GTM',
                'iso2' => 'GT',
                'phonecode' => '502',
                'capital' => 'Guatemala City',
                'currency' => 'GTQ',
                'native' => 'Guatemala',
                'wikiDataId' => '',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 97,
                'name' => 'Honduras',
                'iso3' => 'HND',
                'iso2' => 'HN',
                'phonecode' => '504',
                'capital' => 'Tegucigalpa',
                'currency' => 'HNL',
                'native' => 'Honduras',
                'wikiDataId' => '',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 142,
                'name' => 'Mexico',
                'iso3' => 'MEX',
                'iso2' => 'MX',
                'phonecode' => '52',
                'capital' => 'Mexico City',
                'currency' => 'MXN',
                'native' => 'México',
                'wikiDataId' => '',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 159,
                'name' => 'Nicaragua',
                'iso3' => 'NIC',
                'iso2' => 'NI',
                'phonecode' => '505',
                'capital' => 'Managua',
                'currency' => 'NIO',
                'native' => 'Nicaragua',
                'wikiDataId' => '',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 170,
                'name' => 'Panama',
                'iso3' => 'PAN',
                'iso2' => 'PA',
                'phonecode' => '507',
                'capital' => 'Panama City',
                'currency' => 'PAB',
                'native' => 'Panamá',
                'wikiDataId' => '',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 233,
                'name' => 'United States',
                'iso3' => 'USA',
                'iso2' => 'US',
                'phonecode' => '1',
                'capital' => 'Washington',
                'currency' => 'USD',
                'native' => 'United States',
                'wikiDataId' => '',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}