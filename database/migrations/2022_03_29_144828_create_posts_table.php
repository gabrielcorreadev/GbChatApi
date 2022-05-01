<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->text('description');
            $table->integer('timeline_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->boolean('active')->default(1);
            $table->string('youtube_title', 255);
            $table->string('youtube_video_id', 250);
            $table->string('latitude');
			$table->string('longitude');
            $table->string('type', 100);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
