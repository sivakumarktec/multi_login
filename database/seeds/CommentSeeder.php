<?php

use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert(array (
        	0 => array(
                'comments' => 'Test Comments added by Admin',
                'created_by'=> 'Administrator',
                'is_admin_created' => 1
            ),
            1 => array(
                'comments' => 'Test Comments added by Customer',
                'created_by'=> 'Test Customer',
                'is_admin_created' => 0
            ),
            2 => array(
                'comments' => 'Test Comments 2 added by Admin',
                'created_by'=> 'Administrator',
                'is_admin_created' => 1
            ),
        ));
    }
}
