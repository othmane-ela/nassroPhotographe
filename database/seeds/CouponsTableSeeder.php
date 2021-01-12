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
            'code'=> 'OTHMANE2K21',
            'type'=> 'fixed',
            'value'=>'30'
        ]);
        Coupon::create([
            'code'=> 'OTHMANE2K22',
            'type'=> 'percent',
            'percent_off'=>'50'
        ]);
    }
}
