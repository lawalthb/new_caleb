<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //id, on_blog, from_user, body, at_time
        Schema::create('messages', function(Blueprint $table)
        {
            $table->increments('id');
            $table -> integer('from');
            $table -> string('from_role');
            $table -> integer('to');
            $table -> string('to_role');
            $table->boolean('active');
            $table->string('title');
            $table->text('body');
            $table->string('attach');
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
        // drop comment
        Schema::drop('messages');
    }
}
