<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class SeederProizvod extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('proizvods')->insert([
            'sifra' => 'S6',
            'ime' => 'I6',
            'cena' => 22.25,
            'firma_id' => 1
        ]);
    }
}
