<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MarcaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $marcas = [
            [
                'descricao'=>'Coca-Cola'
            ],
            [
                'descricao'=>'Pepis'
            ],
            [
                'descricao'=>'Dolly'
            ],
            [
                'descricao'=>'Fanta'
            ],
            [
                'descricao'=>'Guaraná Antartica'
            ],
            [
                'descricao'=>'Guaraná'
            ],
            [
                'descricao'=>'Baré'
            ],
            [
                'descricao'=>'Sukita'
            ],
            [
                'descricao'=>'Grupo São Geraldo'
            ]
        ];
        DB::table('marcas')->insert($marcas);
    }
}
