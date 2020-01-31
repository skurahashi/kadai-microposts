<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 100; $i++) {
            DB::table('users')->insert([
                'name' => 'test_name ' . $i,
                'email' => 'test' . $i . '@test.com',
                'password' => bcrypt('password'.$i)
            ]);
        }
    }
}
