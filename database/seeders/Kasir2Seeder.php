<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class Kasir2Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kasir2 = User::create([
            'name'      => 'kasir3',
            'email'     => 'kasir3@gmail.com',
            'password'  => bcrypt('12345678')
        ]);

        $kasir = Permission::where('name', 'kasir')->first();

        $transaksi =  Permission::where('name', 'transaksi')->first();

        $kasir2->assignRole('kasir');
        $kasir2->givePermissionTo($kasir);
        $kasir2->givePermissionTo($transaksi);
    }
}
