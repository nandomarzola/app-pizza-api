<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AddressSeeder::class);
        $this->call(BanksSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
         /*$this->call(RoleSeeder::class);
         $this->call(PaymentMethodSeeder::class);
         $this->call(CategorySeeder::class);
         $this->call(IngredientSeeder::class);
         $this->call(PizzaSeeder::class);
         $this->call(PizzaIngredientSeeder::class);*/
    }
}
