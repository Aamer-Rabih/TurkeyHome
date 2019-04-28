<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseLessonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_lesson', function (Blueprint $table) {
            $table->engine = 'InnoDB' ;
            $table->collation = 'utf16_general_ci';
            $table->charset = 'utf16';
            $table->increments('id');
            $table->unsignedInteger('course_id');
            $table->unsignedInteger('lesson_id');
            $table->timestamps();


            //Build the Foreign Key constraints
            $table->foreign('course_id')
                ->references('id')
                ->on('courses');
                
            $table->foreign('lesson_id')
                ->references('id')
                ->on('lessons');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_lesson');
    }
}
