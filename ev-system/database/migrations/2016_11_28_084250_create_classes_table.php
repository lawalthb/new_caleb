<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        // class table
        Schema::create('classes', function(Blueprint $table)
        {
            $table->increments('id');
            $table -> integer('teacher_id') -> unsigned() -> default(0);
            $table -> integer('student_id') -> unsigned() -> default(0);
            $table -> integer('subject_id') -> unsigned() -> default(0);
            $table -> integer('section_id') -> unsigned() -> default(0);
            $table->string('title')->unique();
            $table->string('slug')->unique();
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
        
        Schema::drop('classes');
    }

}
