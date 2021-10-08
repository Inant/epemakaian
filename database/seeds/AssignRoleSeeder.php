<?php

use App\Entity\User\User;
use Illuminate\Database\Seeder;

class AssignRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::whereUsername('admin')->first();
        $petugas = User::whereUsername('petugas')->first();

        $admin->assignRole('admin');
        $petugas->assignRole('petugas');
    }
}
