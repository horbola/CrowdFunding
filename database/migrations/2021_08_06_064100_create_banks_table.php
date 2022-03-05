<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('bank_name');
            $table->bigInteger('bank_swift_code', false, false);
            $table->string('branch_name')->nullable();
            $table->bigInteger('branch_swift_code', false, false)->nullable();
            $table->string('owner_name');
            $table->bigInteger('acc_number', false, false);
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
        Schema::dropIfExists('banks');
    }
}
