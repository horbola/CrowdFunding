<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            // permanent, current, past
            // whenever a permanent or current address changes
            // the present permament or current address will be changed to past
            $table->string('type');
            $table->foreignId('user_id');
            $table->string('holding')->nullable(); //or home
            $table->string('road')->nullable(); //or village
            $table->integer('post_code')->nullable();
            $table->string('upazilla')->nullable();
            $table->string('district')->nullable();
            $table->foreignId('country_id')->nullable();
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
        Schema::dropIfExists('addresses');
    }
}
