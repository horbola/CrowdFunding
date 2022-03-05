<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMobileBanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mobile_banks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            // ed: bkash, nagad, upay
            $table->string('brand_name');
            $table->string('mobile_number');
            $table->string('owner_name');
            $table->string('owner_nid');
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
        Schema::dropIfExists('mobile_banks');
    }
}
