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
            $table->string('no')->default('');
            $table->string('name')->default('');
            $table->string('date')->default('');
            $table->string('timetable')->default('');
            $table->string('onduty')->default('');
            $table->string('offduty')->default('');
            $table->string('clockin')->default('');
            $table->string('clockout')->default('');
            $table->string('normal')->default('');
            $table->string('realtime')->default('');
            $table->string('late')->default('');
            $table->string('early')->default('');
            $table->string('absent')->default('');
            $table->string('ottime')->default('');
            $table->string('worktime')->default('');
           // $table->timestamp('email_verified_at')->nullable();
           // $table->string('password');
           // $table->rememberToken();
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