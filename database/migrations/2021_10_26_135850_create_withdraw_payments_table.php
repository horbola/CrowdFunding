<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWithdrawPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('withdraw_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('withdraw_request_id');
            // representing class name of any payment method
            $table->string('payment_meth_type')->nullable();
            // contains different payment method info of user like credit cart or bank or mobile bank
            $table->foreignId('payment_meth_id')->nullable();
            $table->double('amount');
            $table->string('currency');
            $table->string('trans_id');
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
        Schema::dropIfExists('withdraw_payments');
    }
}
