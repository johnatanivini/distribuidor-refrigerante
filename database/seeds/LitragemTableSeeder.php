<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LitragemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $litragens = [
            [
                'descricao'=>'100ml'
            ],
            [
                'descricao'=>'150ml'
            ],
            [
                'descricao'=>'200ml'
            ],
            [
                'descricao'=>'250ml'
            ],
            [
                'descricao'=>'300ml'
            ],
            [
                'descricao'=>'350ml'
            ],
            [
                'descricao'=>'400ml'
            ],
            [
                'descricao'=>'450ml'
            ],
            [
                'descricao'=>'500ml'
            ],
            [
                'descricao'=>'550ml'
            ],
            [
                'descricao'=>'600ml'
            ],
            [
                'descricao'=>'750ml'
            ],
            [
                'descricao'=>'1l'
            ],
            [
                'descricao'=>'1,5l'
            ],
            [
                'descricao'=>'2L'
            ],
            [
                'descricao'=>'2,5L'
            ],
            [
                'descricao'=>'3,5L'
            ],
        ];
        DB::table('litragens')->insert($litragens);
    }
}
