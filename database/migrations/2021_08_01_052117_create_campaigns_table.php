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
            
            $table->integer('user_id')->nullable();
            $table->mediumInteger('country_id')->nullable();
            $table->string('address')->nullable();
            $table->integer('category_id')->nullable();
            $table->tinyInteger('is_staff_picks')->nullable(); //1:staff Picks
                
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->string('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->string('feature_image')->nullable();
            $table->string('feature_video')->nullable();
            
            $table->decimal('goal')->nullable();
            $table->tinyInteger('end_method')->default(1); // 0:ends-by-date, 1:ends-by-goal
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->decimal('min_amount')->nullable();
            $table->decimal('max_amount')->nullable();
            $table->decimal('recommended_amount')->nullable();
            $table->string('amount_prefilled')->nullable();
            
            $table->tinyInteger('status')->nullable()->default(0); // 0:pending, 1:approved, 2:cancelled, 3:blocked, 4:declined
            $table->tinyInteger('is_funded')->nullable(); //0:pending,1:approve,2:blocked
            
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
