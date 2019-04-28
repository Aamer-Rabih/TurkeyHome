<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShowLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('show_lessons', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->collation = 'utf16_general_ci';
            $table->charset = 'utf16';
            $table->increments('id');
            
            $table->string('title',300)->unique();
            $table->integer('order')->unsigned()->nullable();
            $table->string('src',500)->unique();
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
        Schema::dropIfExists('show_lessons');
    }
}
