<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(['name' => 'admin']);
        $petugas = Role::create(['name' => 'petugas']);

        // penomoran
        Permission::create(['name' => 'penomoran-show']);
        Permission::create(['name' => 'penomoran-create']);
        Permission::create(['name' => 'penomoran-update']);
        Permission::create(['name' => 'penomoran-delete']);

        // opd
        Permission::create(['name' => 'opd-show']);
        Permission::create(['name' => 'opd-create']);
        Permission::create(['name' => 'opd-update']);
        Permission::create(['name' => 'opd-delete']);

        // wilayah
        Permission::create(['name' => 'wilayah-show']);
        Permission::create(['name' => 'wilayah-create']);
        Permission::create(['name' => 'wilayah-update']);
        Permission::create(['name' => 'wilayah-delete']);

        // akun
        Permission::create(['name' => 'akun-show']);
        Permission::create(['name' => 'akun-create']);
        Permission::create(['name' => 'akun-update']);
        Permission::create(['name' => 'akun-delete']);

        // jenis pembayaran
        Permission::create(['name' => 'jenis_pembayaran-show']);
        Permission::create(['name' => 'jenis_pembayaran-create']);
        Permission::create(['name' => 'jenis_pembayaran-update']);
        Permission::create(['name' => 'jenis_pembayaran-delete']);

        // rekening bank
        Permission::create(['name' => 'rekening_bank-show']);
        Permission::create(['name' => 'rekening_bank-create']);
        Permission::create(['name' => 'rekening_bank-update']);
        Permission::create(['name' => 'rekening_bank-delete']);

        // tahun
        Permission::create(['name' => 'tahun-show']);
        Permission::create(['name' => 'tahun-create']);
        Permission::create(['name' => 'tahun-update']);
        Permission::create(['name' => 'tahun-delete']);

        // klasifikasi
        Permission::create(['name' => 'klasifikasi-show']);
        Permission::create(['name' => 'klasifikasi-create']);
        Permission::create(['name' => 'klasifikasi-update']);
        Permission::create(['name' => 'klasifikasi-delete']);

        // tarif retribusi
        Permission::create(['name' => 'tarif_retribusi-show']);
        Permission::create(['name' => 'tarif_retribusi-create']);
        Permission::create(['name' => 'tarif_retribusi-update']);
        Permission::create(['name' => 'tarif_retribusi-delete']);

        // pemakai
        Permission::create(['name' => 'pemakai-show']);
        Permission::create(['name' => 'pemakai-create']);
        Permission::create(['name' => 'pemakai-update']);
        Permission::create(['name' => 'pemakai-delete']);

        // object retribusi
        Permission::create(['name' => 'object_retribusi-show']);
        Permission::create(['name' => 'object_retribusi-create']);
        Permission::create(['name' => 'object_retribusi-update']);
        Permission::create(['name' => 'object_retribusi-delete']);

        // skrd
        Permission::create(['name' => 'skrd-show']);
        Permission::create(['name' => 'skrd-create']);
        Permission::create(['name' => 'skrd-update']);
        Permission::create(['name' => 'skrd-delete']);

        // tbp
        Permission::create(['name' => 'tbp-show']);
        Permission::create(['name' => 'tbp-create']);
        Permission::create(['name' => 'tbp-update']);
        Permission::create(['name' => 'tbp-delete']);

        // monitoring piutang
        Permission::create(['name' => 'monitoring_piutang-show']);
        Permission::create(['name' => 'monitoring_piutang-create']);
        Permission::create(['name' => 'monitoring_piutang-update']);
        Permission::create(['name' => 'monitoring_piutang-delete']);

        // salin skrd
        Permission::create(['name' => 'salin_skrd-show']);
        Permission::create(['name' => 'salin_skrd-create']);
        Permission::create(['name' => 'salin_skrd-update']);
        Permission::create(['name' => 'salin_skrd-delete']);

        // lahan pertanian
        Permission::create(['name' => 'lahan_pertanian-show']);
        Permission::create(['name' => 'lahan_pertanian-create']);
        Permission::create(['name' => 'lahan_pertanian-update']);
        Permission::create(['name' => 'lahan_pertanian-delete']);

        // laporan
        Permission::create(['name' => 'laporan']);

        // assign permissions to admin
        $admin->syncPermissions(Permission::get()->pluck('name'));
    }
}
