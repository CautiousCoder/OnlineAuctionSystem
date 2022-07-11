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
            $table->string('slug')->unique();
            $table->longText('sort_description')->nullable();
            $table->longText('description')->nullable();
            $table->integer('base_prize')->default(10);
            $table->integer('regular_prize')->default(10);
            $table->integer('sale_prize')->default(10);
            $table->string('SKU')->nullable();
            $table->integer('stock')->default(0);
            $table->enum('stock_status', ['instock', 'outofstock']);
            $table->string('image')->nullable();
            $table->string('images')->nullable();
            $table->string('post_type')->default("post");
            $table->string('post_status')->default("publish");
            $table->integer('count_comment')->unsigned()->default(0);
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('bit_status')->default('0');
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
