<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SaborTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'descricao'=>'Laranja'
            ],
            [
                'descricao'=>'Limão'
            ],
            [
                'descricao'=>'Uva'
            ],
            [
                'descricao'=>'Guaraná'
            ],
            [
                'descricao'=>'Melancia'
            ],
            [
                'descricao'=>'Shiso'
            ],
            [
                'descricao'=>'Gengibre'
            ],
            [
                'descricao'=>'Mojito'
            ],
            [
                'descricao'=>'Cherry Coke'
            ],
            [
                'descricao'=>'Lima'
            ]
        ];
        DB::table('sabores')->insert($data);
    }
}
