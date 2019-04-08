<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCATestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_a_tests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_a');
            $table->string('first_b');
            $table->string('first_c');
            $table->string('second');
            $table->integer('term_id');
            $table->integer('student_id');
            $table->integer('subject_id');
            $table->integer('class_id');

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
        Schema::dropIfExists('c_a_tests');
    }
}
