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
            $table->id()->unique();
            $table->integer('user_id')->unsigned()->default(0);
            $table->string('title')->unique();
            $table->string('slug');
            $table->string('image')->nullable();
            $table->longText('description')->nullable();
            $table->string('post_type')->default("post");
            $table->string('post_status')->default("publish");
            $table->integer('count_comment')->unsigned()->default(0);
            $table->timestamp('publish_at')->nullable();
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
        Schema::dropIfExists('posts');
    }
};
