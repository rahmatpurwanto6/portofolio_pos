<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $home = Permission::create([
            'name'          => 'home',
            'guard_name'    => 'web'
        ]);

        $kasir_p = Permission::create([
            'name'          => 'kasir',
            'guard_name'    => 'web'
        ]);

        $kategori = Permission::create([
            'name'          => 'kategori',
            'guard_name'    => 'web'
        ]);

        $produk = Permission::create([
            'name'          => 'produk',
            'guard_name'    => 'web'
        ]);

        $member = Permission::create([
            'name'          => 'member',
            'guard_name'    => 'web'
        ]);

        $supplier = Permission::create([
            'name'          => 'supplier',
            'guard_name'    => 'web'
        ]);

        $pembelian = Permission::create([
            'name'          => 'pembelian',
            'guard_name'    => 'web'
        ]);

        $pengeluaran = Permission::create([
            'name'          => 'pengeluaran',
            'guard_name'    => 'web'
        ]);

        $penjualan = Permission::create([
            'name'          => 'penjualan',
            'guard_name'    => 'web'
        ]);

        $transaksi =  Permission::create([
            'name'          => 'transaksi',
            'guard_name'    => 'web'
        ]);

        $laporan = Permission::create([
            'name'          => 'laporan',
            'guard_name'    => 'web'
        ]);

        $admin = User::create([
            'name'      => 'Admin',
            'email'     => 'admin@gmail.com',
            'password'  => bcrypt('12345678')
        ]);

        $admin->assignRole('admin');
        $admin->givePermissionTo($home);
        $admin->givePermissionTo($kategori);
        $admin->givePermissionTo($produk);
        $admin->givePermissionTo($member);
        $admin->givePermissionTo($supplier);
        $admin->givePermissionTo($pembelian);
        $admin->givePermissionTo($penjualan);
        $admin->givePermissionTo($pengeluaran);
        $admin->givePermissionTo($transaksi);
        $admin->givePermissionTo($laporan);

        $kasir = User::create([
            'name'      => 'Kasir',
            'email'     => 'kasir@gmail.com',
            'password'  => bcrypt('123456789')
        ]);

        $kasir->assignRole('kasir');
        $kasir->givePermissionTo($kasir_p);
        $kasir->givePermissionTo($transaksi);

        $kasir2 = User::create([
            'name'      => 'kasir2',
            'email'     => 'kasir2@gmail.com',
            'password'  => bcrypt('12345678')
        ]);

        $kasir2->assignRole('kasir');
        $kasir2->givePermissionTo($kasir_p);
        $kasir2->givePermissionTo($transaksi);
    }
}
