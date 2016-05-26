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
        DB::table('heuristicas')->insert([
            'descricao' => 'Quarta Heurística',    
            'created_at' => Carbon::now()        
        ]);
    }
}
