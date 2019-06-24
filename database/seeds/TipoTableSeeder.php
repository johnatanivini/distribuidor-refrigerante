<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipos = [
            [
                'descricao'=>'Lata'
            ],
            [
                'descricao'=>'Garrafa'
            ],
            [
                'descricao'=>'Pet'
            ],
        ];

        DB::table('tipos')->insert($tipos);
    }
}
