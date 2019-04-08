<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grades', function(Blueprint $table)
        {
            $table->increments('id');
           $table->string('name');
           $table->string('grade_point');
           $table-> integer('mark_from');
           $table-> integer('mark_upto');
            $table->boolean('active');
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
         Schema::drop('grades');
    }
}
