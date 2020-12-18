<?php

use App\Entities\Users;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $admin = Users::create([
            'full_name' => 'admin aja',
            'email' => 'admin@admin.com',
            'username' => 'admin',
            'password' => Hash::make('admin111'),
            'gender' => 'Pria',
        ]);

        $admin->assignRole('admin');

        $user = Users::create([
            'full_name' => 'user aja',
            'email' => 'user@nifty.com',
            'username' => 'user',
            'password' => Hash::make('user111'),
            'gender' => 'Pria',
        ]);

        $admin->assignRole('user');
    }
}
