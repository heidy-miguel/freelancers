<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();  
            $table->string('title');
            $table->date('start_date');
            $table->date('end_date');
            $table->double('rate', 8, 2);
            $table->string('address');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('trainee_id');
            $table->unsignedBigInteger('instructor_id')->nullable();
            $table->foreign('trainee_id')->references('id')->on('trainees');
            $table->foreign('instructor_id')->references('id')->on('instructors');
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
        Schema::dropIfExists('jobs');
    }
}
