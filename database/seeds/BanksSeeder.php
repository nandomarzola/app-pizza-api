<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class BanksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('persons')->insert([
            'id' => '875d08e0-1a71-4d71-8159-96b459328be5',
            'first_name' => 'Nando',
            'last_name' => 'Marzola',
            'cpf' => '12321321321321',
            'cnpj' => '12321321321321',
            'rg' => '12321321321321',
            'ie' => '12321321321321',
            'telephone' => '(14) 99624-2006',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        
    }
}
