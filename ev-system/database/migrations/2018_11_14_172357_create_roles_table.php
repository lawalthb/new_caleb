<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('add_student') -> unsigned() -> default(0);
            $table->integer('view_students') -> unsigned() -> default(0);
            $table->integer('add_parent') -> unsigned() -> default(0);
            $table->integer('view_parents') -> unsigned() -> default(0);
            $table->integer('add_teacher') -> unsigned() -> default(0);
            $table->integer('view_teachers') -> unsigned() -> default(0);
            $table->integer('add_admin') -> unsigned() -> default(0);
            $table->integer('view_admin') -> unsigned() -> default(0);
            $table->integer('add_class') -> unsigned() -> default(0);
            $table->integer('view_classes') -> unsigned() -> default(0);
            $table->integer('add_school') -> unsigned() -> default(0);
            $table->integer('view_schools') -> unsigned() -> default(0);
            $table->integer('add_section') -> unsigned() -> default(0);
            $table->integer('view_sections') -> unsigned() -> default(0);
            $table->integer('add_tests') -> unsigned() -> default(0);
            $table->integer('view_tests') -> unsigned() -> default(0);
            $table->integer('add_subject') -> unsigned() -> default(0);
            $table->integer('view_subjects') -> unsigned() -> default(0);
            $table->integer('add_post') -> unsigned() -> default(0);
            $table->integer('add_media') -> unsigned() -> default(0);
            $table->integer('send_sms') -> unsigned() -> default(0);
            $table->integer('add_exam') -> unsigned() -> default(0);
            $table->integer('view_exams') -> unsigned() -> default(0);
            $table->integer('add_grade') -> unsigned() -> default(0);
            $table->integer('view_grade') -> unsigned() -> default(0);
            $table->integer('add_mark') -> unsigned() -> default(0);
            $table->integer('view_marks') -> unsigned() -> default(0);
            $table->integer('view_general_mark_report') -> unsigned() -> default(0);
            $table->integer('edit_general_mark_report') -> unsigned() -> default(0);
            $table->integer('add_invoice') -> unsigned() -> default(0);
            $table->integer('view_invoice') -> unsigned() -> default(0);
            $table->integer('add_expense') -> unsigned() -> default(0);
            $table->integer('view_expenses') -> unsigned() -> default(0);
            $table->integer('add_expense_category') -> unsigned() -> default(0);
            $table->integer('view_expense_category') -> unsigned() -> default(0);
            $table->integer('add_payment') -> unsigned() -> default(0);
            $table->integer('view_payment') -> unsigned() -> default(0);
            $table->integer('add_employee') -> unsigned() -> default(0);
            $table->integer('view_employee') -> unsigned() -> default(0);
            $table->integer('add_routine') -> unsigned() -> default(0);
            $table->integer('take_attendance') -> unsigned() -> default(0);
            $table->integer('add_hostel') -> unsigned() -> default(0);
            $table->integer('add_library') -> unsigned() -> default(0);
            $table->integer('add_notice') -> unsigned() -> default(0);
            $table->integer('add_transport') -> unsigned() -> default(0);
            $table->integer('view_tools') -> unsigned() -> default(0);
            $table->integer('view_settings') -> unsigned() -> default(0);
            $table->integer('is_student') -> unsigned() -> default(0);
            $table->integer('is_parent') -> unsigned() -> default(0);
            $table->integer('is_teacher') -> unsigned() -> default(0);
            $table->integer('is_quality_assurance') -> unsigned() -> default(0);
            $table->integer('view_result') -> unsigned() -> default(0);
            $table->integer('is_admin') -> unsigned() -> default(0);
            $table->integer('admission_enquiry') -> unsigned() -> default(0);
            $table->integer('view_visitors_log') -> unsigned() -> default(0);
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
        Schema::dropIfExists('roles');
    }
}
