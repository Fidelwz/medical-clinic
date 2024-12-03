<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create(attributes: [
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678')
        ])->assignRole('admin');

        User::create(attributes: [
            'name' => 'doctor',
            'email' => 'doctor@gmail.com',
            'password' => bcrypt('12345678')
        ])->assignRole('doctor');
        User::create(attributes: [
            'name' => 'secretary',
            'email' => 'secretary@gmail.com',
            'password' => bcrypt('12345678')
        ])->assignRole('secretary');
        User::create(attributes: [
            'name' => 'carlo',
            'lastName' => 'cortez',
            'email' => 'patient@gmail.com',
            'file' => '02033920033',
            'password' => bcrypt('12345678')
        ])->assignRole('patient');

       
    }
}
