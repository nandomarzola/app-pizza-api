<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Supports\AddreessesSupport;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('addresses')->insert([
            'id' => 'e959c554-8a1f-441b-be37-8c544a0f940e',
            'street' => 'Capitão Durval de Castro e Silva',
            'number' => 45,
            'complement' => null,
            'city' => 'Marilia',
            'state' => 'SP',
            'zip_code' => '17521-210',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
