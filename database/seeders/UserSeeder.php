<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = "mkarim";
        $user->email = 'm.karimcu@gmail.com';
        $user->password = Hash::make('admin');
        $user->save();
        $user->assignRole('admin');

        $user = new User();
        $user->name = 'riad';
        $user->email = 'riad@gmail.com';
        $user->password = Hash::make('user');
        $user->save();
        $user->assignRole('user');

        $user = new User();
        $user->name = 'dulal';
        $user->email = 'dulal@gmail.com';
        $user->password = Hash::make('writer');
        $user->save();
        $user->assignRole('writer');
    }
}
