<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $admin=User::create([
        	'name' => 'Admin',
        	'email' =>'admin@gmail.com',
        	'password' =>Hash::make('123456789'),
        ]);
        $admin->assignRole('admin');
    }
}
