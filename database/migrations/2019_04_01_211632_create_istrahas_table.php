<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIstrahasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('istrahas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cover_image');
            $table->string('istraha_name');
            $table->text('istraha_description');
            $table->string('istraha_address');
            $table->string('istraha_location');
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
        Schema::dropIfExists('istrahas');
    }
}
