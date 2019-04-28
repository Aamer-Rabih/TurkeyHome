<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLessonUnitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lesson_unit', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->collation = 'utf16_general_ci';
            $table->charset = 'utf16';
            $table->increments('id');
            $table->unsignedInteger('unit_id');
            $table->unsignedInteger('lesson_id');
            $table->unsignedInteger('lesson_order');

            $table->foreign('unit_id')
                ->references('id')
                ->on('units');

            $table->foreign('lesson_id')
                ->references('id')
                ->on('lessons');

            
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
        Schema::dropIfExists('lesson_unit');
    }
}
