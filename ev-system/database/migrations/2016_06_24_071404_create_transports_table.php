<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransportsTable extends Migration
{
       
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { // class table
        Schema::create('transports', function(Blueprint $table)
        {
            $table->increments('id');
           $table->string('route_name');
           $table->string('number_of_vehicle');
           $table->string('description');
           $table->string('route_fare');
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
       Schema::drop('transports');
    }
}
