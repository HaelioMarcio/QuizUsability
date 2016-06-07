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
            'descricao' => 'Dentro de um tempo razoável, o sistema mantém o usuário sempre informado sobre o que está acontecendo no mesmo.',
            'created_at' => Carbon::now()
            ],
            [
                'titulo' => 'Prevenção de erros',
                'descricao' => 'Prevenir, sempre que possível,a ocorrência de erros.',
                'created_at' => Carbon::now()
            ],
            [
                'titulo' => 'Correspondência entre o sistema e o mundo real',
                'descricao' => 'O sistema utiliza uma linguagem comum aos usuários, em vez de termos técnicos e específicos.',
                'created_at' => Carbon::now()
            ],
            [
                'titulo' => 'Reconhecimento em vez de recordação',
                'descricao' => 'Fazer com que os objetos, ações e opções presentes na interface estejam sempre visíveis.',
                'created_at' => Carbon::now()
            ],
            [
                'titulo' => 'Controle do usuário e liberdade',
                'descricao' => 'Oferece saída de emergência claramente identificada, permitindo que os usuários saiam facilmente de situações inesperadas.o usuário e liberdade',
                'created_at' => Carbon::now()
            ],
            [
                'titulo' => 'Flexibilidade e eficiência de utilização',
                'descricao' => 'Fornece opções que otimizam a experiência de usuários mais experientes.',
                'created_at' => Carbon::now()
            ],
            [
                'titulo' => 'Consistência e padrões',
                'descricao' => 'Evitar que o usuário tenha que pensar se ações ou situações diferentes significam a mesma coisa.',
                'created_at' => Carbon::now()
            ],
            [
                'titulo' => 'Estética e design minimalista',
                'descricao' => 'Evita o uso de informações irrelevantes.',
                'created_at' => Carbon::now()
            ],
            [
                'titulo' => 'Reconhecimento, diagnóstico e auto-recuperação em caso de erros',
                'descricao' => 'Utiliza linguagem simples para apresentar os erros e mostra como contorná-los.',
                'created_at' => Carbon::now()
            ],
            [
                'titulo' => 'Ajuda e documentação',
                'descricao' => 'Fornece informações que podem ser facilmente encontradas e orienta os usuários através de passos simples.',
                'created_at' => Carbon::now()
            ]
        ]);
    }
}
