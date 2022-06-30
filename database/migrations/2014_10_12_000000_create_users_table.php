<?php

use App\Http\Controllers\User\UserController;
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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('role_name')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::create('profile', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('phone')->nullable();
            $table->string('road_num')->nullable();
            $table->string('zip_num')->nullable();
            $table->string('state')->nullable();
            $table->string('contry')->default('Bangladesh');
            $table->string('image_name')->nullable();
            $table->string('license_number')->default('XXX-XX-XXX');
            $table->string('nid_number')->default('XXXXXXXXXX');
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
        Schema::dropIfExists('profile');
    }
};
