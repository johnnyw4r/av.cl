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
            $table->bigincrements('id');
            $table->string('name',100);
            $table->string('gender',10);
            $table->string('email',128)->unique();
            $table->string('password',100);
            $table->string('country',128);
            $table->string('region',128);
            $table->string('commune');
            $table->string('city',128);
            $table->string('sector',128);
            $table->string('mobile',64);
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
