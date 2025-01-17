<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('user_id');
            $table->foreignId('category_id');
            $table->boolean('is_picked')->default(false);
                
            $table->string('title');
            $table->string('slug');
            $table->string('short_description');
            $table->longText('description');
            $table->string('feature_image');
            $table->string('feature_video')->nullable();
            
            $table->integer('goal', false, true);
            // 0:ends-by-date, 1:ends-by-goal
            $table->tinyInteger('end_method')->default(1);
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('min_amount', false, true)->nullable();
            $table->integer('max_amount', false, true)->nullable();
            $table->integer('recommended_amount', false, true)->nullable();
            $table->string('amount_prefilled')->nullable();
            // -1:preview, 0:pending, 1:approved, 2:cancelled, 3:blocked, 4:declined
            $table->tinyInteger('status')->nullable()->default(0);
                                                                                                                                                                                                        
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
        Schema::dropIfExists('campaigns');
    }
}
