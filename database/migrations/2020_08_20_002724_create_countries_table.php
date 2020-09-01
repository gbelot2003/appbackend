<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('iso3', 3);
            $table->string('iso2', 2);
            $table->string('phonecode', 255);
            $table->string('capital', 255);
            $table->string('currency', 255);
            $table->string('native', 255);
            $table->string('wikiDataId', 255)->nullable();
            $table->timestamps();
        });

        Schema::create('states', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->unsignedBigInteger('country_id')->index();
            $table->char('country_code', 2);
            $table->string('fips_code', 255)->nullable();
            $table->string('iso2', 255)->nullable();
            $table->tinyInteger('flag');
            $table->string('wikiDataId', 255);
            $table->timestamps();

            $table->foreign('country_id')
                ->references('id')->on('countries')
                ->onDelete('cascade');
        });

        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->unsignedBigInteger('state_id')->index();
            $table->string('state_code', 255);
            $table->unsignedBigInteger('country_id')->index();
            $table->char('country_code', 2);
            $table->decimal('latitude', 10,8);
            $table->decimal('longitude', 11,8);
            $table->tinyInteger('flag')->nullable();
            $table->string('wikiDataId', 255)->nullable();
            $table->timestamps();

            $table->foreign('state_id')
                ->references('id')
                ->on('states')
                ->onDelete('cascade');;

            $table->foreign('country_id')
                ->references('id')
                ->on('countries')
                ->onDelete('cascade');;
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists('cities');
        Schema::dropIfExists('states');
        Schema::dropIfExists('countries');
    }
}
