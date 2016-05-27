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
                'descricao' => 'Projeto Um',
                'projeto_id' => 1,
                'created_at' => Carbon::now()
            ]
        ]);
    }
}
