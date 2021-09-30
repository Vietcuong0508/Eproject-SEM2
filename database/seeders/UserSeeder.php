<?php

namespace Database\Seeders;

use App\Enums\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
//        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('users')->truncate();
        DB::table('users')->insert([
            [
                'fullName' => 'Ha Duy Nhat',
                'email' => 'haduynhat@fpt.edu.vn',
                'phone' => '0817184221',
                'address' => 'Thai Binh',
                'username' => 'haduynhat',
                'password' => Hash::make('123456'),
                'role' => Role::ADMIN
            ],
            [
                'fullName' => 'Tran Viet Cuong',
                'email' => 'tranvietcuong@gmail.com',
                'phone' => '098968656',
                'address' => 'Thai Binh',
                'username' => 'Tran Viet Cuong',
                'password' => Hash::make('123456'),
                'role' => Role::ADMIN
            ],
            [
                'fullName' => 'Dao Quang Huy ',
                'email' => 'DaoQuangHuy@gmail.com',
                'phone' => '0686789999',
                'address' => 'Ha Noi',
                'username' => 'DaoQuangHuy',
                'password' => Hash::make('123456'),
                'role' => Role::USER
            ],
            [
                'fullName' => 'Nguyen Tien Dung',
                'email' => 'Nguyentiendung@gmail.com',
                'phone' => '0568685555',
                'address' => 'Ha Noi',
                'username' => 'nguyentiendung',
                'password' => Hash::make('123456'),
                'role' => Role::USER
            ],
        ]);
    }
}
