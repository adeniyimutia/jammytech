<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatelessonsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('ratelessons', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('rate', [1, 2, 3, 4, 5]);
            $table->string('comment');
            $table->integer('student_id')->nullable();
            $table->integer('tutor_id')->nullable();
            $table->integer('lesson_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('ratelessons');
    }
}
