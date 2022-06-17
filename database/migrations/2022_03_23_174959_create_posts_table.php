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
            $table->longText('sort_description')->nullable();
            $table->longText('description')->nullable();
            $table->integer('base_priz')->default(10);
            $table->integer('regular_priz')->default(10);
            $table->integer('sale_priz')->default(10);
            $table->string('SKU')->nullable();
            $table->enum('stock_status', ['instock', 'outofstock']);
            $table->string('image')->nullable();
            $table->string('images')->nullable();
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
