<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(HeuristicaTableSeeder::class);
        $this->call(RespostaTableSeeder::class);
        $this->call(PerguntaTableSeeder::class);
    }
}
