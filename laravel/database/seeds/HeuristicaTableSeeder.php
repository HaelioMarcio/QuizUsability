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
            'titulo' => 'Visibilidade do status do sistema',
            'descricao' => 'Visibilidade do status do sistema',
            'created_at' => Carbon::now()
            ],
            [
                'titulo' => 'Prevenção de erros',
                'descricao' => 'Prevenção de erros',
                'created_at' => Carbon::now()
            ],
            [
                'titulo' => 'Correspondência entre o sistema e o mundo real',
                'descricao' => 'Correspondência entre o sistema e o mundo real',
                'created_at' => Carbon::now()
            ],
            [
                'titulo' => 'Reconhecimento em vez de recordação',
                'descricao' => 'Reconhecimento em vez de recordação',
                'created_at' => Carbon::now()
            ],
            [
                'titulo' => 'Controle do usuário e liberdade',
                'descricao' => 'Controle do usuário e liberdade',
                'created_at' => Carbon::now()
            ],
            [
                'titulo' => 'Flexibilidade e eficiência de utilização',
                'descricao' => 'Flexibilidade e eficiência de utilização',
                'created_at' => Carbon::now()
            ],
            [
                'titulo' => 'Consistência e padrões',
                'descricao' => 'Consistência e padrões',
                'created_at' => Carbon::now()
            ],
            [
                'titulo' => 'Estética e design minimalista',
                'descricao' => 'Estética e design minimalista',
                'created_at' => Carbon::now()
            ],
            [
                'titulo' => 'Reconhecimento, diagnóstico e auto-recuperação em caso de erros',
                'descricao' => 'Reconhecimento, diagnóstico e auto-recuperação em caso de erros',
                'created_at' => Carbon::now()
            ],
            [
                'titulo' => 'Ajuda e documentação',
                'descricao' => 'Ajuda e documentação',
                'created_at' => Carbon::now()
            ]
        ]);
    }
}
