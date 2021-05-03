<?php

use Illuminate\Database\Seeder;
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
        for ($i = 1; $i <= 20; $i++) {
            DB::table('users')->insert([
                [
                    'name' => "テストユーザー{$i}" ,
                    'email' => "test{$i}@mail.com",
                    'password' => Hash::make("testpass{$i}"),
                    'self_introduction' => "testtext{$i}",
                    'created_at' => date("Y/m/d H:i:s", strtotime("{$i} day")),
                    'updated_at' => date("Y/m/d H:i:s", strtotime("{$i} day"))
                ]
            ]);
        }
    }
}
