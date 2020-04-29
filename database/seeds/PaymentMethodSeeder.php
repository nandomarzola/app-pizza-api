<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Supports\PaymentMethodSupport;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_methods')->insert([
            'id' => PaymentMethodSupport::CASH,
            'name' => 'Cash',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('payment_methods')->insert([
            'id' => PaymentMethodSupport::DEBIT_CARD,
            'name' => 'Debit Card',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('payment_methods')->insert([
            'id' => PaymentMethodSupport::CREDIT_CARD,
            'name' => 'Credit Card',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
