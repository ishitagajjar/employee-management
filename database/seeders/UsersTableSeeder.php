<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'first_name' => 'admin',
                'last_name' => 'admin',
                'role' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin123'),
                'created_at' => \Carbon\Carbon::now(),
            ],
            [
                'first_name' => 'employee1',
                'last_name' => 'kc',
                'role' => 'employee',
                'email' => 'employee1@gmail.com',
                'password' => bcrypt('employee123'),
                'created_at' => \Carbon\Carbon::now(),
            ],
        ]);
    }
}
