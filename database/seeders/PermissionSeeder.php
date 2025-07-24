<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    { 
        $permissions = [
            'view.buku', 'create.buku', 'edit.buku', 'delete.buku',
            'view.kategori', 'create.kategori', 'edit.kategori', 'delete.kategori',
            'view.penerbit', 'create.penerbit', 'edit.penerbit', 'delete.penerbit',
            'view.log',
        ];

        foreach($permissions as $name) {
            Permission::firstOrCreate(['name' => $name]);
        }

        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $userRole = Role::firstOrCreate(['name' => 'user']);

        $adminRole->syncPermissions(Permission::all());

        $userRole->syncPermissions([
            'view.buku',
            'view.kategori',
            'view.penerbit',
        ]);
    }
}
