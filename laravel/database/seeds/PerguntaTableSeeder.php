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
                'descricao' => 'O sistema possui feedback rápido indicando o que você está fazendo na interface no momento?',
                'heuristica_id' => 1,
                'created_at' => Carbon::now()
            ],
            [
                'descricao' => 'O sistema possui feedback rápido indicando em qual interface você está acessando no momento?',
                'heuristica_id' => 1,
                'created_at' => Carbon::now()
            ],
            [
                'descricao' => 'O sistema possui feedback rápido indicando como você pode prosseguir na navegação do sistema?',
                'heuristica_id' => 1,
                'created_at' => Carbon::now()
            ],
            [
                'descricao' => 'O sistema possui ícones que ajudam a impedir a ocorrência de erros?',
                'heuristica_id' => 2,
                'created_at' => Carbon::now()
            ],
            [
                'descricao' => 'O sistema utiliza palavras, termos, expressões e conceitos familiares ao usuário?',
                'heuristica_id' => 3,
                'created_at' => Carbon::now()
            ],
            [
                'descricao' => 'As informações aparecem em uma ordem lógica e natural como se fossem representações do mundo real?',
                'heuristica_id' => 3,
                'created_at' => Carbon::now()
            ],
            [
                'descricao' => 'O sistema oferece informações explicando passos para uma determinada tarefa?',
                'heuristica_id' => 4,
                'created_at' => Carbon::now()
            ],
            [
                'descricao' => 'O sistema possui instruções, ações e opções visíveis ou facilmente recuperáveis sempre que apropriado para o uso?',
                'heuristica_id' => 4,
                'created_at' => Carbon::now()
            ],

            [
                'descricao' => 'O site é de fácil acesso, como também chegar a alguma tarefa ou objetivo de seu interesse?',
                'heuristica_id' => 5,
                'created_at' => Carbon::now()
            ],
            [
                'descricao' => 'O sistema possui alguma saída de emergência?',
                'heuristica_id' => 5,
                'created_at' => Carbon::now()
            ],
            [
                'descricao' => 'O sistema possui funções “Desfazer” e “Refazer” facilmente disponíveis?',
                'heuristica_id' => 5,
                'created_at' => Carbon::now()
            ],
            [
                'descricao' => 'O sistema possui características de personalização de ações que podem ser feitos pelo próprio usuário?',
                'heuristica_id' => 6,
                'created_at' => Carbon::now()
            ],
            [
                'descricao' => 'O sistema possui teclas de atalho para aumentar a eficiência de usuários novatos ou experientes?',
                'heuristica_id' => 6,
                'created_at' => Carbon::now()
            ],
            [
                'descricao' => 'O sistema possui palavras, situações ou ações que geram dúvidas de entendimento ou interpretação?',
                'heuristica_id' => 7,
                'created_at' => Carbon::now()
            ],
            [
                'descricao' => 'O sistema possui padrões e estilos consistentes?',
                'heuristica_id' => 7,
                'created_at' => Carbon::now()
            ],
            [
                'descricao' => 'O sistema possui links que disponibilizam informações extras raramente necessárias?',
                'heuristica_id' => 8,
                'created_at' => Carbon::now()
            ],
            [
                'descricao' => 'O sistema possui diálogo com informações irrelevantes ou raramente necessárias?',
                'heuristica_id' => 8,
                'created_at' => Carbon::now()
            ],
            [
                'descricao' => 'O sistema possui mensagens de erros que indicam precisamente o problema?',
                'heuristica_id' => 9,
                'created_at' => Carbon::now()
            ],
            [
                'descricao' => 'O sistema possui mensagens de erros com sugestão de soluções construtivas?',
                'heuristica_id' => 9,
                'created_at' => Carbon::now()
            ],
            [
                'descricao' => 'O sistema possui opção de ajuda?',
                'heuristica_id' => 10,
                'created_at' => Carbon::now()
            ],
            [
                'descricao' => 'O sistema possui opção de ajuda de fácil acesso ou localização?',
                'heuristica_id' => 10,
                'created_at' => Carbon::now()
            ]
        ]);
    }
}