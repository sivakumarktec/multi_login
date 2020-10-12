<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name' => 'Administrator',
            'email'=> 'admin@admin.com',
            'password' => Hash::make('password'),
            'created_at' => '2018-07-04 03:24:17',
            'updated_at' => '2018-07-04 03:24:17',
        ]);
    }
}
