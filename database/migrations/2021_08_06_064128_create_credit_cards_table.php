<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreditCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credit_cards', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('bank_name')->nullable();
            $table->bigInteger('bank_swift_code', false, false)->nullable();
            $table->string('branch_name')->nullable();
            $table->bigInteger('branch_swift_code', false, false)->nullable();
            $table->string('owner_name');
            $table->bigInteger('card_number', false, false);
            $table->date('card_issued');
            $table->date('card_expires');
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
        Schema::dropIfExists('credit_cards');
    }
}
