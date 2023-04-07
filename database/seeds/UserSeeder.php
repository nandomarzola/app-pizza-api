<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Supports\RoleSupport;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => '2e1fb583-7e33-4476-a4ab-39933606c019',
            'role_id' => RoleSupport::ADMIN_ROLE,
            'person_id' => '875d08e0-1a71-4d71-8159-96b459328be5',
            'address_id' => 'e959c554-8a1f-441b-be37-8c544a0f940e',
            'email' => 'nandomarzola1@gmail.com',
            'password' => bcrypt('123456'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
