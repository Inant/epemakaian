<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(AkunTableSeeder::class);
        $this->call(JenisPembayaranTableSeeder::class);
        $this->call(KlasifikasiPemakaianTableSeeder::class);
        $this->call(RekeningBankTableSeeder::class);
        $this->call(KecamatanTableSeeder::class);
        $this->call(KelurahanTableSeeder::class);
        // $this->call(PemakaiTableSeeder::class);
        $this->call(TarifRetribusiTableSeeder::class);
        $this->call(OpdTableSeeder::class);
        // $this->call(ObjectRetribusiTableSeeder::class);
        // $this->call(SkrdTableSeeder::class);
        $this->call(PenomoranTableSeeder::class);
        $this->call(PetugasTableSeeder::class);
        $this->call(TahunTableSeeder::class);
        // $this->call(PertanianTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(AssignRoleSeeder::class);
    }
}
