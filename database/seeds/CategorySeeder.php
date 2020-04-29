<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Supports\CategorySupport;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'id' => CategorySupport::NON_VEGGIE,
            'name' => 'Non-Veggie',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('categories')->insert([
            'id' => CategorySupport::VEGGIE,
            'name' => 'Veggie',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
