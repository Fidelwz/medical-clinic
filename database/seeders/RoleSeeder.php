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
        $rolesecretary =  Role::create(['name' => 'secretary']);
        $rolePatient =  Role::create(['name' => 'patient']);





        Permission::create(['name' => 'patients.index'])->syncRoles([$rolesecretary]);
        Permission::create(['name' => 'patients.create'])->syncRoles([$rolesecretary]);
        Permission::create(['name' => 'patients.update'])->syncRoles([$rolesecretary]);
        Permission::create(['name' => 'patients.delete'])->syncRoles([$rolesecretary]);
        

        Permission::create(['name' => 'doctor.index'])->syncRoles([$roleDoctor, $rolesecretary]);
        Permission::create(['name' => 'doctor.create'])->syncRoles([$roleDoctor, $rolesecretary]);
        Permission::create(['name' => 'doctor.update'])->syncRoles([$roleDoctor, $rolesecretary]);
        Permission::create(['name' => 'doctor.delete'])->syncRoles([$roleDoctor, $rolesecretary]);

        Permission::create(['name' => 'secretary.index'])->syncRoles([$roleDoctor, $rolesecretary]);
        Permission::create(['name' => 'secretary.create'])->syncRoles([$roleDoctor, $rolesecretary]);
        Permission::create(['name' => 'secretary.update'])->syncRoles([$roleDoctor, $rolesecretary]);
        Permission::create(['name' => 'secretary.delete'])->syncRoles([$roleDoctor, $rolesecretary]);

        Permission::create(['name' => 'office.index'])->syncRoles([$rolesecretary]);
        Permission::create(['name' => 'office.create'])->syncRoles([$rolesecretary]);
        Permission::create(['name' => 'office.update'])->syncRoles([$rolesecretary]);
        Permission::create(['name' => 'office.delete'])->syncRoles([$rolesecretary]);

        Permission::create(['name' => 'appointment.index'])->syncRoles([$roleDoctor, $rolesecretary,$rolePatient]);
        Permission::create(['name' => 'appointment.create'])->syncRoles([$roleDoctor, $rolesecretary]);
        Permission::create(['name' => 'appointment.update'])->syncRoles([$roleDoctor, $rolesecretary]);
        Permission::create(['name' => 'appointment.delete'])->syncRoles([$roleDoctor, $rolesecretary]);


    }
}
