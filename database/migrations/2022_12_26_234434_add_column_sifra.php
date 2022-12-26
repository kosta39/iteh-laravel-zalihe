<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnSifra extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('proizvods', function (Blueprint $table) {
            $table->after('id', function ($table) {
                $table->string('sifra');
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('proizvods', function (Blueprint $table) {
            $table->dropColumn('sifra');
        });
    }
}
