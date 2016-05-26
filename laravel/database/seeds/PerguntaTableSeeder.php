<?php

use Illuminate\Database\Seeder;
use \Carbon\Carbon;

class PerguntaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pergunta')->insert([
            [
                'descricao' => 'O site está lhe informando o status como atualizado após o carregamento?',
                'heuristica_id' => 1,
                'created_at' => Carbon::now()
            ],
            [
                'descricao' => 'O site apresentou algum erro para você enquanto estava utilizando?',
                'heuristica_id' => 2,
                'created_at' => Carbon::now()
            ],
            [
                'descricao' => 'Nas apresentações textuais do site, apresenta facilidade de leitura e entendimento, foi o que você esperava? ',
                'heuristica_id' => 3,
                'created_at' => Carbon::now()
            ],
            [
                'descricao' => 'O site oferece informações explicando passos para uma determinada tarefa? ',
                'heuristica_id' => 4,
                'created_at' => Carbon::now()
            ],
            [
                'descricao' => 'O site é de fácil acesso, como também chegar ha alguma tarefa ou objetivo de seu interesse?',
                'heuristica_id' => 5,
                'created_at' => Carbon::now()
            ],
            [
                'descricao' => 'O site acima oferece recursos avançados para usuários do mesmo, facilitando o acesso com atalhos? ',
                'heuristica_id' => 6,
                'created_at' => Carbon::now()
            ],
            [
                'descricao' => 'O site acima, oferece um padrão para ações de mesmo caminho? ',
                'heuristica_id' => 7,
                'created_at' => Carbon::now()
            ],
            [
                'descricao' => 'Sobre mensagens de erro, apresenta claramente a descrição do mesmo com fácil entendimento?',
                'heuristica_id' => 8,
                'created_at' => Carbon::now()
            ]
                
//            ,
//            [
//                'descricao' => 'Reconhecimento, diagnóstico e auto-recuperação em caso de erros',
//                'created_at' => Carbon::now()
//            ],
//            [
//                'descricao' => 'Ajuda e documentação',
//                'created_at' => Carbon::now()
//            ]
        ]);
    }
}
