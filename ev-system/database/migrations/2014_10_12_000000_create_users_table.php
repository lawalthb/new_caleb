<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('reg_no');
            $table -> integer('class_id') -> unsigned() -> default(0);
            $table -> integer('section_id') -> unsigned() -> default(0);
            $table -> integer('parent_id') -> unsigned() -> default(0);
            $table -> integer('dormitory_id') -> unsigned() -> default(0);
            $table -> integer('school_id') -> unsigned() -> default(1);
            $table->string('image');
            $table->enum('role',['student', 'teacher', 'parent','admin', 'super', 'receptionist', 'quality_assurance'])->default('student');
            $table -> integer('role_id') -> unsigned();
            $table->enum('admin_type',['user', 'super'])->default('user');
            $table->string('birthday');
            $table->string('gender');
            $table->boolean('active') -> default(1);
            $table->string('religion');
            $table->string('bloodgroup');
            $table->string('profession');
            $table->string('address');
            $table->string('phone');
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
