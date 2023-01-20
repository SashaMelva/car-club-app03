<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role')->insert([

            [
                'role_name ' => 'Администратор', 'description' => '',
                'role_name ' => 'Приёмщик машин', 'description' => '',
                'role_name ' => 'Автослесарь', 'description' => '',
            ]
        ]);
    }
}
