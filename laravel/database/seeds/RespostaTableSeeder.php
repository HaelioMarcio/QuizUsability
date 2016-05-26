<?php

use Illuminate\Database\Seeder;

class RespostaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('resposta')->insert([
            [
                'descricao' => 'Sim. Perfeitamente.',
                'peso' => 100
            ],
            [
                'descricao' => 'Parcialmente.',
                'peso' => 50
            ],
            [
                'descricao' => 'Não.',
                'peso' => 0
            ]
        ]);
    }
}
