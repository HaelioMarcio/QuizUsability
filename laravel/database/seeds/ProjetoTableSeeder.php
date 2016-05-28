<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProjetoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projeto')->insert([
            [
                'titulo' => 'Projeto Um',
                'descricao' => 'Descrição do projeto um',
                'user_id' => 1,
                'created_at' => Carbon::now()
            ]
        ]);
    }
}
