<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWhatsappLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('whatsapp_links', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->collation = 'utf16_general_ci';
            $table->charset = 'utf16';
            $table->increments('id');
            $table->string('url',500)->unique();
            $table->unsignedInteger('linkable_id');
            $table->string('linkable_type');
            $table->integer('order');
            $table->string('type');
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
        Schema::dropIfExists('whatsapp_links');
    }
}
