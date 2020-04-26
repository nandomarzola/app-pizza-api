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
            'role_id' => RoleSupport::ADMIN_ROLE,
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123456'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
