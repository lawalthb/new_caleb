<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassRoutineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routines', function(Blueprint $table)
        {
            $table->increments('id');
            $table -> integer('subject_id') -> unsigned() -> default(0);
            $table -> integer('class_id') -> unsigned() -> default(0);
            $table->string('starts');
            $table->string('ends');
            $table -> integer('day_id') -> unsigned() -> default(0);
            $table->enum('time',['am','pm'])->default('am');
            $table->boolean('active')->default(1);
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
        Schema::drop('routines');
    }
}
