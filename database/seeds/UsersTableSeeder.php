<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $user=User::where('email','sohan.ice.pust@gmail.com')->first();
      if(!$user){
        User::create([
          'name' => 'Md Sohanur Rahaman',
          'role' => 'admin',
          'email' => 'sohan.ice.pust@gmail.com',
          'password'=>Hash::make('password')
        ]);
      }
    }
}
