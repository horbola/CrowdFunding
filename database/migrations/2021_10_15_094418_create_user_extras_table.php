<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserExtrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_extras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->date('birth_date')->nullable();
            $table->string('phone')->nullable();
            $table->bigInteger('nid')->nullable()->unique();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('careof')->nullable();
            $table->string('careof_phone')->nullable();
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
        Schema::dropIfExists('user_extras');
    }
}
