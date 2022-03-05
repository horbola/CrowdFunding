<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->default('');
            $table->string('nicename', 255)->default('');
            $table->string('full_name', 255)->nullable();
            $table->string('flag', 6)->nullable();
            $table->string('capital', 255)->nullable();
            $table->string('citizenship', 255)->nullable();
            
            // iso_3166_2
            $table->string('iso', 2)->default('');
            $table->string('iso3', 3)->default('')->nullable();
            $table->string('numcode', 3)->default('')->nullable();
            $table->string('region_code', 3)->default('')->nullable();
            $table->string('sub_region_code', 3)->default('')->nullable();
            
            $table->string('currency', 255)->nullable();
            $table->string('currency_code', 255)->nullable();
            $table->string('currency_sub_unit', 255)->nullable();
            $table->string('currency_symbol', 3)->nullable();
            $table->integer('currency_decimals')->nullable();
            
            $table->string('phonecode', 4)->nullable();
            $table->boolean('eea')->default(0);
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
        Schema::dropIfExists('countries');
    }
}
