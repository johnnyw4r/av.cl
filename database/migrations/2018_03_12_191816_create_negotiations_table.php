<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNegotiationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('negotiations', function (Blueprint $table) {
            $table->increments('id');
            $table->double('price');

            $table->biginteger('user_id') ->unsigned();
            $table->biginteger('post_id') ->unsigned();
            $table->text('comment');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('post_id')->references('id')->on('posts')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('negotiations');
    }
}