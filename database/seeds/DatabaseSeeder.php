<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();
//        $this->call(UserTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->command->info('User table seeded');
        $this->call(PostTableSeeder::class);
        $this->command->info('Post table seeded');
    }
}
