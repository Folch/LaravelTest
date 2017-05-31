<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        $password = password_hash('secret', PASSWORD_BCRYPT);

        DB::table('users')->insert(
            [
                'name' => 'name 1',
                'email' => 'user1@gmail.com',
                'password' => $password
            ]);
        DB::table('users')->insert([
            'name' => 'name 2',
            'email' => 'user2@gmail.com',
            'password' => $password
        ]);
        DB::table('users')->insert([
            'name' => 'name 3',
            'email' => 'user3@gmail.com',
            'password' => $password
        ]);
    }
}
