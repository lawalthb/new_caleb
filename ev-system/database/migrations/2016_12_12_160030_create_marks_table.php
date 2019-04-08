<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marks', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('subject_id');
            $table->integer('student_id');
            $table->integer('class_id');
            $table->integer('exam_id');
            $table->integer('term_id') -> default(1);
            $table->integer('mark_obtained');
            $table->integer('mark_total');
            $table->string('comment');
            
            $table->string('obedience');
            $table->string('honesty');
            $table->string('self_reliance');
            $table->string('self_control');
            $table->string('use_of_initiative');
            $table->string('punctuality');
            $table->string('general_neatness');
            $table->string('industry_or_perserverance');
            $table->string('attendance_in_class');
            $table->string('attentiveness');
            $table->string('handwriting');
            $table->string('sports_and_games');
            $table->string('verbal_communication');
            $table->string('manual_skills');
            $table->string('handling_musical_instruments');
            $table->string('vacation_date');
            $table->string('resumption');
            $table->string('teacher_comment');
            $table->string('teacher_id');
            $table->string('principal_comment');
            $table->enum('status',[0,1])->default(1);
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
        Schema::drop('marks');
    }
}
