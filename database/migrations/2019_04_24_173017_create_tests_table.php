<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->collation = 'utf16_general_ci';
            $table->charset = 'utf16';
            $table->increments('id');
            $table->string('title',100);
            $table->integer('term');
            $table->integer('sub_test');
            $table->boolean('active')->default(true);
            $table->string('type',30);
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
        Schema::dropIfExists('tests');
    }
}
