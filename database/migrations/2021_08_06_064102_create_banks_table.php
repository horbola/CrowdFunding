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
            $table->foreignId('user_id');
            $table->string('bank_name');
            $table->string('bank_swift_code')->nullable();
            $table->string('branch_name');
            $table->string('branch_swift_code')->nullable();
            $table->string('owner_name');
            $table->string('owner_nid');
            $table->bigInteger('acc_number');
            // 1.current, 2.past
            $table->tinyInteger('status');
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
