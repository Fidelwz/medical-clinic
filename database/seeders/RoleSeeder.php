<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role00 = Role::create(['name' => 'admin']);
        $role01 =  Role::create(['name' => 'doctor']);
        $role02 =  Role::create(['name' => 'nourse']);
        $role03 =  Role::create(['name' => 'patient']);





        Permission::create(['name' => 'admin.']);
    }
}
