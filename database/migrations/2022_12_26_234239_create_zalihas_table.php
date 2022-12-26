<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZalihasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zalihas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('proizvod_id')->constrained('proizvods');
            $table->string('merna_jedinica');
            $table->double('kolicina');
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
        Schema::dropIfExists('zalihas');
    }
}
