<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventRegsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_regs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('teamName')->nullable()->unique();
            $table->string('teamManagerName')->nullable();
            $table->integer('phone')->nullable();

            $table->string('p1name')->nullable();
            $table->integer('p1nid')->nullable();
            $table->date('p1dob')->nullable();
            $table->string('p1city')->nullable();
            $table->string('p1district')->nullable();
            $table->integer('p1post')->nullable();
            $table->string('p1village')->nullable();
            $table->text('p1image')->nullable();

            $table->string('p2name')->nullable();
            $table->integer('p2nid')->nullable();
            $table->date('p2dob')->nullable();
            $table->string('p2city')->nullable();
            $table->string('p2district')->nullable();
            $table->integer('p2post')->nullable();
            $table->string('p2village')->nullable();
            $table->text('p2image')->nullable();

            $table->string('teamLocation')->nullable();
            $table->string('category')->nullable();
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
        Schema::dropIfExists('event_regs');
    }
}
