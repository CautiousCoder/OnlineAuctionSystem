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
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug');
            $table->text('description')->nullable();
            $table->timestamps();
        });
        Schema::create('posts_tags', function (Blueprint $table) {
            // $table->bigIncrements('id');
            $table->foreignId('posts_id')->constrained();
            $table->foreignId('tags_id')->constrained();
            // $table->unsignedBigInteger('posts_id');
            // $table->foreign('posts_id')->references('id')->on('posts')->onDelete('cascade');
            // $table->unsignedBigInteger('tags_id');
            // $table->foreign('tags_id')->references('id')->on('tags');
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
        Schema::dropIfExists('tags');
        Schema::dropIfExists('post_tags');
    }
};
