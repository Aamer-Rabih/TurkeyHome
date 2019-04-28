<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassLessonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_lesson', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->collation = 'utf16_general_ci';
            $table->charset = 'utf16';
            $table->increments('id');
            $table->unsignedInteger('class_id');
            $table->unsignedInteger('lesson_id');
            $table->timestamps();

            $table->foreign('class_id')
                ->references('id')
                ->on('classes');
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
        Schema::dropIfExists('class_lesson');
    }
}
