<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roleAdmin = Role::create(['name' => 'admin', 'full_access' => 'yes']);
        $roleDoctor =  Role::create(['name' => 'doctor']);
        $roleNourse =  Role::create(['name' => 'nourse']);
        $rolePatient =  Role::create(['name' => 'patient']);





        Permission::create(['name' => 'patients.index'])->syncRoles([$roleDoctor, $roleNourse]);
        Permission::create(['name' => 'patients.create'])->syncRoles([$roleDoctor, $roleNourse]);
        Permission::create(['name' => 'patients.update'])->syncRoles([$roleDoctor, $roleNourse]);




    }
}
