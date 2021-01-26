<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['new', 'followup','done','cancel']);

            $table->integer('user_id')->unsigned()->nullable();

            $table->string('name')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('civil_id')->nullable();

            $table->integer('admin_id')->unsigned()->nullable();

            $table->date('date');
            $table->time('time', $precision = 0);

            $table->timestamps();
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointments');
    }
}
