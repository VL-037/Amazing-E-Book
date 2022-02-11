<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('account')->insert([
            // ['role_id' => 1, 'gender_id' => 1, 'first_name' => '', 'middle_name' => '', 'last_name' => '', 'email' => '@gmail.com', 'password' => Hash::make('')],
            ['role_id' => 1, 'gender_id' => 1, 'first_name' => 'Admin', 'middle_name' => 'Male', 'last_name' => '1', 'email' => 'adminm1@gmail.com', 'password' => Hash::make('adminm123'), 'display_picture_link' => '/uploads/images/default_profile.jpg'],
            ['role_id' => 1, 'gender_id' => 2, 'first_name' => 'Admin', 'middle_name' => 'Female', 'last_name' => '1', 'email' => 'adminf1@gmail.com', 'password' => Hash::make('adminf123'), 'display_picture_link' => '/uploads/images/default_profile.jpg'],
            ['role_id' => 2, 'gender_id' => 1, 'first_name' => 'Vincent', 'middle_name' => '', 'last_name' => 'Low', 'email' => 'vincent@gmail.com', 'password' => Hash::make('vincent123'), 'display_picture_link' => '/uploads/images/default_profile.jpg'],
            ['role_id' => 2, 'gender_id' => 1, 'first_name' => 'Bambang', 'middle_name' => 'Jamet', 'last_name' => 'Kenari', 'email' => 'bambang@gmail.com', 'password' => Hash::make('bambang123'), 'display_picture_link' => '/uploads/images/default_profile.jpg'],
        ]);
    }
}
