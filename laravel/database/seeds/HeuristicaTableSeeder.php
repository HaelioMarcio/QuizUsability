<?php

use Illuminate\Database\Seeder;
use \Carbon\Carbon;

class HeuristicaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('heuristica')->insert([
            [
            'descricao' => 'Visibilidade do status do sistema',
            'created_at' => Carbon::now()
            ],
            [
                'descricao' => 'Prevenção de erros',
                'created_at' => Carbon::now()
            ],
            [
                'descricao' => 'Correspondência entre o sistema e o mundo real',
                'created_at' => Carbon::now()
            ],
            [
                'descricao' => 'Reconhecimento em vez de recordação',
                'created_at' => Carbon::now()
            ],
            [
                'descricao' => 'Controle do usuário e liberdade',
                'created_at' => Carbon::now()
            ],
            [
                'descricao' => 'Flexibilidade e eficiência de utilização',
                'created_at' => Carbon::now()
            ],
            [
                'descricao' => 'Consistência e padrões',
                'created_at' => Carbon::now()
            ],
            [
                'descricao' => 'Estética e design minimalista',
                'created_at' => Carbon::now()
            ],
            [
                'descricao' => 'Reconhecimento, diagnóstico e auto-recuperação em caso de erros',
                'created_at' => Carbon::now()
            ],
            [
                'descricao' => 'Ajuda e documentação',
                'created_at' => Carbon::now()
            ]
        ]);
    }
}
