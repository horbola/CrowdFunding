<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('donation_id');
            // bank = 1, credit_card = 2, mobile_bank = 3
            $table->tinyInteger('payment_meth_type')->nullable();
            // contains different payment method info of user like credit cart or bank or mobile bank
            $table->bigInteger('payment_meth_id')->nullable();
            $table->integer('amount');
            $table->integer('trans_id');
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
        Schema::dropIfExists('payments');
    }
}
