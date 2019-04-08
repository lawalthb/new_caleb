<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // class table
        Schema::create('subjects', function(Blueprint $table)
        {
            $table->increments('id');
            $table -> integer('teacher_id') -> unsigned() -> default(0); 
            $table -> integer('class_id') -> unsigned() -> default(0);
            $table->string('title')->unique();
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
        // drop blog table
        Schema::drop('subjects');
    }
}
