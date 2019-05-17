<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('title');
            $table->text('category');
            $table->boolean('complete');
            $table->unsignedBigInteger('progress');
            $table->unsignedBigInteger('children_id')->nullable();
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
        Schema::table('goals', function (Blueprint $table) {
        
            $table->foreign('children_id')->references('id')->on('childrens')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('goals');
    }
}
