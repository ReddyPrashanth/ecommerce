<?php

use App\Coupon;
use Illuminate\Database\Seeder;

class CouponsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Coupon::create([
            'code' => 'ABC123',
            'type' => 'fixed',
            'value' => 2000
        ]);

        Coupon::create([
            'code' => 'DEF123',
            'type' => 'percent',
            'value' => 20
        ]);
    }
}
