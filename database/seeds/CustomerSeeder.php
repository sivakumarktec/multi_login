<?php

use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([
            'name' => 'Test Customer',
            'email'=> 'customer@customer.com',
            'password' => Hash::make('password'),
            'created_at' => '2018-07-04 03:24:17',
            'updated_at' => '2018-07-04 03:24:17',
        ]);
    }
}
