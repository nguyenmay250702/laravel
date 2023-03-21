<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $list_user = [
            [
                'name' => "Nguyễn Mây",
                'email' => "nguyenmay308@gmail.com",
                'password' => "250702"
            ],
            [
                'name' => "Nguyễn A",
                'email' => "nguyena123@gmail.com",
                'password' => "123"
            ],

        ];

        DB::table('users')->delete(); //xóa tat ca bn ghi hien co trong bang

        foreach ($list_user as $user) {
            User::insert($user);
        }
    }
}