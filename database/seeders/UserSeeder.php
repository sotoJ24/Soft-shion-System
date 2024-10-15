<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
        $user = User::create([
            'name' => 'Root',
            'user_name' => 'rootSaDa01',
            'password' =>  Hash::make('1960+2013')
        ])->assignRole('admin');


        $token = $user->createToken('auth_token')->plainTextToken;
    }
}
