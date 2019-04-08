<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function(Blueprint $table)
        {
            $table->increments('id');
           $table->string('title');
           $table->string('description');
           $table->string('amount');
           $table->string('amount_paid');
           $table->string('due');
           $table->string('date');
           $table->integer('creation_timestamp');
           $table->integer('student_id');
           $table->string('payment_method');
           $table->string('payment_detail');
            $table->string('status');
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
        Schema::drop('invoices');
    }
}
