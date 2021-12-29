<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profites', function (Blueprint $table) {
            $table->increments('id');
            $table->string('invoice_id')->nullable()->index();
            $table->integer('buying_price')->nullable();
            $table->integer('selling_price')->nullable();
            $table->integer('discount_amount')->nullable();
            $table->integer('profite')->nullable();
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
        Schema::dropIfExists('profites');
    }
}
