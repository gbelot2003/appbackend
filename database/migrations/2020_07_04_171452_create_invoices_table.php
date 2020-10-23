<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->index()->unsigned();
            $table->decimal('lat');
            $table->decimal('lon');
            $table->string('street')->nullable();
            $table->string('house')->nullable();
            $table->string('estado')->nullable();
            $table->text('details')->nullable();
            $table->text('zone');
            $table->decimal('subtotal');
            $table->decimal('total');
            $table->timestamps();
        });

        Schema::create('invoices_products', function(Blueprint $table){
            $table->id();
            $table->integer('product_id')->index()->unsigned();
            $table->integer('prod_cant')->unsigned();
            $table->integer('invoices_id')->index()->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices_products');
        Schema::dropIfExists('invoices');
    }
}
