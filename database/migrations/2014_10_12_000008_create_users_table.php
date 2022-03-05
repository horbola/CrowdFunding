<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('fb_id')->nullable();
            $table->string('google_id')->nullable();
            $table->string('password');
            $table->string('two_factor_code')->nullable();
            $table->dateTime('two_factor_expires_at')->nullable();
            
            // 0:pending, 1:active, 2:malicous, 3:blocked, 4:left, 5:paused
            $table->tinyInteger('active_status')->default('1');
            // 0:not, 1:requested, 2:volunteer, 3:removed, 4:resigned
            $table->tinyInteger('is_volunteer')->default('0');
            // 1:true, 2:false
            $table->boolean('is_special')->default(false);
            // 0:not, 1:admin, 2:rejected, 3:resigned
            $table->tinyInteger('is_admin')->default('0');
            // 0:true, 1:false
            $table->boolean('is_super')->default(false);
            
            $table->string('photo')->nullable();
            $table->enum('gender', ['male', 'female', 'others'])->nullable();
            $table->longText('about')->default('No Information about the fundraiser is provided');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
