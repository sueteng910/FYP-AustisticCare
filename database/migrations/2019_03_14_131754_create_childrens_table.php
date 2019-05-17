<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChildrensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('childrens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->date('birthday');
            $table->string('gender');
            $table->string('myKID')->unique();
            $table->unsignedBigInteger('mother_id')->nullable();
            $table->unsignedBigInteger('therapist_id')->nullable();
            $table->string('children_pic')->nullable();
            
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
        Schema::table('childrens', function (Blueprint $table) {
        
            $table->foreign('mother_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('therapist_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('children');
    }
}
