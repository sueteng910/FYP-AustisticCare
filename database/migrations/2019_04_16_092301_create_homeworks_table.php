<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomeworksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homeworks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('children_id')->nullable();
            $table->string('title');
            $table->string('description');
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->string('step_1')->nullable();
            $table->string('step_2')->nullable();
            $table->string('step_3')->nullable();
            $table->string('step_4')->nullable();
            $table->string('step_5')->nullable();
            $table->date('due');
            $table->string('review')->nullable();
            $table->boolean('complete');



            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
        Schema::table('homeworks', function (Blueprint $table) {
        
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
        Schema::dropIfExists('homeworks');
    }
}
