<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdviceClassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advice_class', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->collation = 'utf16_general_ci';
            $table->charset = 'utf16';
            $table->increments('id');
            $table->unsignedInteger('advice_id');
            $table->unsignedInteger('class_id');
            $table->timestamps();

            //ForeignKey Build 
            $table->foreign('advice_id')
                ->references('id')
                ->on('advices');
            
            $table->foreign('class_id')
                ->references('id')
                ->on('classes');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('advice_class');
    }
}
