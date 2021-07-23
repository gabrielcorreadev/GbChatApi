<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeviceManagerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('device_manager', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('access_token_id', 100)->index();
            $table->foreign('access_token_id')->references('id')->on('oauth_access_tokens')->onDelete('cascade');
            $table->ipAddress('visitor')->nullable();
            $table->decimal('lat', 10, 8);
            $table->decimal('lng', 11, 8);
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
        Schema::dropIfExists('device_manager');
    }
}
