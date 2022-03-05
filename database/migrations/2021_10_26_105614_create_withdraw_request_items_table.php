<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWithdrawRequestItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('withdraw_request_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('withdraw_request_id');
            $table->foreignId('campaign_id');
            $table->decimal('requested_amount')->default(0);
            $table->decimal('paid_amount')->default(0);
            // 1.pending, 2.funded, 3.blocked
            $table->tinyInteger('status')->default(1);
            // 1.yes, 2.no
            $table->boolean('currently_blocked')->default(false);
            $table->longText('block_msg')->nullable();
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
        Schema::dropIfExists('withdraw_request_items');
    }
}
