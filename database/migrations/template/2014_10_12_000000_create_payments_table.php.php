<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->int('order_id');
            $table->int('payment_meth_type')->enum(['credit_card', 'bank', 'mobile_bank', 'cash_on_delivery']);
            $table->int('payment_meth_id'); // contains differents payments of user like credit cart or bank or mobile bank
            $table->int('amount');
            $table->int('trans_id');
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
        Schema::dropIfExists('users');
    }
}
