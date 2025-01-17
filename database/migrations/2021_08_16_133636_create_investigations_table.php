<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvestigationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investigations', function (Blueprint $table) {
            $table->id();
            // this user_id is actually volunteer id
            $table->foreignId('user_id');
            $table->foreignId('campaign_id')->unique();
            $table->longText('text_report');
            $table->string('image_report')->nullable();
            $table->string('video_report')->nullable();
            // 1.yes, 2.no
            $table->string('is_verified')->default('no');
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
        Schema::dropIfExists('investigations');
    }
}
