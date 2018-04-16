<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigincrements('id');
            
            $table->biginteger('user_id')->unsigned();
            
            $table->integer('subcategory_id')->unsigned();

            $table->string('title',128);
            $table->text('body');
            $table->string('slug',128);
            $table->char('negotiable',1);
            $table->double('price',15,3);
            $table->double('oldPrice',15,3);
            $table->double('bestPrice',15,3);
            $table->date('dateStart');
            $table->date('dateEnd');
            $table->string('country',128);
            $table->string('region',128);
            $table->string('commune',128);
            $table->string('city',128);
            $table->string('sector',128);
            $table->char('deleted',1);
            $table->enum('state',['DRAFT','FOR REVISED','IN REVISION','DISCART','PUBLISHED'])->default('DRAFT');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');

            $table->foreign('subcategory_id')->references('id')->on('categories');




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
}
