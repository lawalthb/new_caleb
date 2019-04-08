<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function(Blueprint $table)
        {
            $table->increments('id');
           $table->string('system_name');
           $table->string('system_title');
           $table->string('address');
           $table->string('system_email');
           $table->string('currency');
           $table->string('text_align');
           $table->string('skin_color');
           $table->string('page');
           $table->string('can_change');
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
        Schema::drop('settings');
    }
}
