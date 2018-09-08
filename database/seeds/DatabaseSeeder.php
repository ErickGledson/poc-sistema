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
        // $this->call(UsersTableSeeder::class);
        \App\User::create([
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt(123456),
            'level' => 1
        ]);

        \App\User::create([
            'name' => 'cliente',
            'email' => 'cliente@mail.com',
            'password' => bcrypt(123456),
            'level' => 2
        ]);
    }
}
