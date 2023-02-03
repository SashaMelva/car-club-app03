<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Database\Seeders\RoleUserSeeder;
use App\Models\Role;
use App\Models\Work;

class DatabaseSeeder extends Seeder
{
    
    public function run()
    {
        DB::table('roles')->insert([

            ['roleName' => 'Администратор', 'description' => 'Функционал администратора: Регистрация новых пользователей в системе; Создание/открытие/закрытие смен;',],
        
            ['roleName' => 'Приёмщик машин', 'description' => 'Функционал приемщика машин: Создание нового заказа; Добавление/удаление работИмя из заказа',],
            
            ['roleName' => 'Механик', 'description' => 'Функционал автослесаря: Просмотр заказов, принятых от клиентов; Изменение статуса заказа на «выполняется» и «выполнен».',],
        ]);


        DB::table('work')->insert([

            ['workName' => 'Замена шин', 'description' => 'Функционал администратора: Регистрация новых пользователей в системе; Создание/открытие/закрытие смен;',],
            
            ['workName' => 'Замена деталей', 'description' => 'Функционал приемщика машин: Создание нового заказа; Добавление/удаление работИмя из заказа',],
            
            ['workName' => 'Ремонт деталей', 'description' => 'Функционал автослесаря: Просмотр заказов, принятых от клиентов; Изменение статуса заказа на «выполняется» и «выполнен».',],

            ['workName' => 'Выравнивание вмятин', 'description' => 'Функционал автослесаря: Просмотр заказов, принятых от клиентов; Изменение статуса заказа на «выполняется» и «выполнен».',],
        ]);

        DB::table('statusWorkShift')->insert([

            ['statusWorkShiftName' => 'Окрыта',],
            
            ['statusWorkShiftName' => 'Закрыта',],
            
        ]);

        DB::table('statusOrder')->insert([

            ['statusOrderName' => 'Принят',],

            ['statusOrderName' => 'Выолняется',],
            
            ['statusOrderName' => 'Готов',],

            ['statusOrderName' => 'Оплачен',],
            
        ]);

        DB::table('userrs')->insert([

            ['name' => 'Артём', 'surname' => 'Кукушев', 'patronymic' => 'Артёмович', 'idRoles' => '1', 'login' => 'admin', 'password' => '123',],
        ]);
    }
 }

