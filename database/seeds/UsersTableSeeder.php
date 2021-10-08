<?php

use App\Entity\User\User;
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
        $admin = User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password')
        ]);

        $petugas = User::create([
            'name' => 'Petugas',
            'email' => 'arjuno@example.com',
            'username' => 'petugas',
            'password' => Hash::make('password')
        ]);
    }
}
