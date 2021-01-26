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
            $table->string('name')->nullable();
            $table->string('username');
            $table->string('email')->unique();
            $table->string('phone_number')->unique();
            $table->string('civil_id')->nullable();
            $table->string('stop_number')->nullable();
            $table->string('nationality')->nullable();
            $table->enum('gender', ['male', 'female']);
            $table->enum('social_status', ['single', 'married']);
            $table->integer('age')->nullable();
            $table->string('diets_before')->nullable();
            $table->integer('height')->nullable();
            $table->string('current_weight')->nullable();
            $table->string('physical_activity')->nullable();
            $table->string('medications')->nullable();
            $table->string('water_intake')->nullable();
            $table->enum('appetite', ['good', 'very_good']);
            $table->string('sleep')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
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
