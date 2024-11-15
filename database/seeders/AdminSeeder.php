<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::updateOrCreate(
            [
                'email' => 'marsportz@gmail.com'
            ],
            [
                'email' => 'marsportz@gmail.com',
                'password' => Hash::make('MarSportZ@99$#789'),
                'name' => 'Mar Sportz',
                'username' => 'marsportz'
            ]
        );
    }
}
