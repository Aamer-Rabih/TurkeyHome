<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_classes', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('class_id');
            $table->unsignedInteger('student_id');

            $table->unique(['class_id','student_id']);

            
            $table->foreign('class_id')
                ->references('id')
                ->on('classes')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            
                $table->foreign('student_id')
                    ->references('id')
                    ->on('users')
                    ->OnDelete('cascade')
                    ->onUpdate('cascade');


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
        Schema::dropIfExists('request_classes');
    }
}
