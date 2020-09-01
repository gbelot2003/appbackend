<?php

use App\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->unsignedInteger('user_id')->index();
            $table->string('avatar', 255)->nullable();
            $table->string('alias', 30)->nullable();
            $table->text('about')->nullable();
            $table->integer('country_id')->nullable(); // Se cambiara luego
            $table->integer('city_id')->nullable(); // Se cambiara luego
            $table->string('field_facebook')->nullable();
            $table->string('field_twitter')->nullable();
            $table->string('field_instagram')->nullable();
            $table->string('field_linkedin')->nullable();
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('CASCADE')
                ->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
