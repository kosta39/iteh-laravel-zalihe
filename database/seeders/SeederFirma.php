<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeederFirma extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('firmas')->insert([
            'ime' => 'I6',
            'sajt' => 'S6',
            'email' => 'E6'
        ]);
    }
}
