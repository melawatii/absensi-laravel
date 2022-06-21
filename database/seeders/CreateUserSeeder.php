<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'is_admin' => true,
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Melawati',
                'email' => 'user@gmail.com',
                'rayon_id' => 1,
                'rombel_id' => 2,
                'nis' => '12007891',
                'is_admin' => false,
                'password' => bcrypt('password'),
            ]
        ];
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
