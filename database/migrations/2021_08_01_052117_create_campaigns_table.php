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
            $table->boolean('is_staff_picks')->nullable()->default(false);
                
            $table->string('title');
            $table->string('slug');
            $table->string('short_description');
            $table->longText('description');
            $table->string('feature_image');
            $table->string('feature_video')->nullable();
            
            $table->decimal('goal');
            // 0:ends-by-date, 1:ends-by-goal
            $table->tinyInteger('end_method')->default(1);
            $table->date('start_date');
            $table->date('end_date');
            $table->decimal('min_amount')->nullable();
            $table->decimal('max_amount')->nullable();
            $table->decimal('recommended_amount')->nullable();
            $table->string('amount_prefilled')->nullable();
            
            // -1:preview, 0:pending, 1:approved, 2:cancelled, 3:blocked, 4:declined
            $table->tinyInteger('status')->nullable()->default(0);
            // if a campaign is investigated and satisfied as valid then it's verified
            $table->boolean('isVerified')->nullable()->default(false);
            // status of withdraw request
            // 0:not requested, 1:requested 2:funded, 3:blocked
            $table->tinyInteger('is_funded')->nullable();
                                                                                                                                                                                                        
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
