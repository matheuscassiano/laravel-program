<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('user_id');
            $table->string('name', 255);
            $table->string('user')->unique()->nullable();
            $table->string('pass')->nullable();
            $table->string('cpf', 14)->unique();
            $table->string('email', 255)->unique();
            $table->string('phone', 14);
            $table->boolean('status')->default(false);
            $table->timestamp('date_time');
        //    $table->time('time');
        //  $table->timestamp('email_verified_at')->nullable();
        //  $table->string('password');
        //  $table->rememberToken();
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
