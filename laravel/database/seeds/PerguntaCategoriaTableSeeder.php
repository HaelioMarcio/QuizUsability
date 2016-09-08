<?php

use Illuminate\Database\Seeder;

class PerguntaCategoriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categoria')->insert([
            [
                'descricao' => 'Sistema Desktop',
            ],
            [
                'descricao' => 'Site/Portal',
            ],
            [
                'descricao' => 'Sistema Web',
            ],
            [
                'descricao' => 'Aplicativo Mobile',
            ]
        ]);
    }
}
