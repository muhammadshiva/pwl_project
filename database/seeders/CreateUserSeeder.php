<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = [
            [
                'name' => 'Admin',
                'email' => 'admin@mail.com',
                'is_user' => 1,
                'password' => bcrypt('12345678'),
            ],
            [
                'name' => 'User',
                'email' => 'user@mail.com',
                'is_user' => 2,
                'password' => bcrypt('12345678'),
            ]
        ];
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
