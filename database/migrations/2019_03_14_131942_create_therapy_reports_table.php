<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTherapyReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('therapy_reports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->time('start_time');
            $table->time('end_time');
            $table->text('therapy_name');
            $table->text('children_id');
            $table->text('therapist_id');
            $table->unsignedBigInteger('goal')->nullable();
            $table->text('description')->nullable();
            $table->unsignedBigInteger('rating')->nullable();
            $table->unsignedBigInteger('progress')->nullable();
            $table->boolean('mark_as_done');
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
        Schema::table('therapy_reports', function (Blueprint $table) {
        
            $table->foreign('goal')->references('id')->on('goals')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('therapy_report');
    }
}
