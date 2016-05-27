<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class QuestionarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('questionario')->insert([
            [
                'descricao' => 'Questionario Um',
                'projeto_id' => 1,
                'objetivo' => 'Objetivo Um',
                'token' => str_random(15),
                'created_at' => Carbon::now()
            ],
            [
                'descricao' => 'Questionario Dois',
                'projeto_id' => 1,
                'objetivo' => 'Objetivo Dois',
                'token' => str_random(15),
                'created_at' => Carbon::now()
            ],
            [
                'descricao' => 'Questionario Três',
                'projeto_id' => 1,
                'objetivo' => 'Objetivo Três',
                'token' => str_random(15),
                'created_at' => Carbon::now()
            ]
        ]);
    }
}
