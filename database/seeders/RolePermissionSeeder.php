<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission as ModelsPermission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ModelsPermission::create(['name'=>'tambah-tugas']);
        ModelsPermission::create(['name'=>'edit-tugas']);
        ModelsPermission::create(['name'=>'hapus-tugas']);
        ModelsPermission::create(['name'=>'lihat-tugas']);

        
        ModelsPermission::create(['name'=>'tambah-user']);
        ModelsPermission::create(['name'=>'edit-user']);
        ModelsPermission::create(['name'=>'hapus-user']);
        ModelsPermission::create(['name'=>'lihat-user']);

        Role::create(['name'=> 'admin']);
        Role::create(['name'=> 'manager']);

        $roleAdmin = Role::findByName('admin');
        $roleAdmin -> givePermissionTo('tambah-user');
        $roleAdmin -> givePermissionTo('edit-user');
        $roleAdmin -> givePermissionTo('hapus-user');
        $roleAdmin -> givePermissionTo('lihat-user');

        $roleManager = Role::findByName('manager');
        $roleManager -> givePermissionTo('tambah-tugas');
        $roleManager -> givePermissionTo('edit-tugas');
        $roleManager -> givePermissionTo('hapus-tugas');
        $roleManager -> givePermissionTo('lihat-tugas');
    }
}
