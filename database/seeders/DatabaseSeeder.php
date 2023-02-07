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

            ['statusWorkShiftName' => 'Ожидает',],
            ['statusWorkShiftName' => 'Окрыто',],
            ['statusWorkShiftName' => 'Закрыто',],
            
        ]);

        DB::table('statusOrder')->insert([

            ['statusOrderName' => 'Принят',], 
            ['statusOrderName' => 'Выполняется',], 
            ['statusOrderName' => 'Готов',], 
            ['statusOrderName' => 'Оплачен',],
            
        ]);

        DB::table('userr')->insert([

            ['name' => 'Артём', 'surname' => 'Кукушев', 'patronymic' => 'Артёмович', 'idRole' => '2', 'login' => 'admin', 'password' => '123',],
            ['name' => 'Виктор', 'surname' => 'Петров', 'patronymic' => 'Николаевич', 'idRole' => '3', 'login' => 'mex1', 'password' => '123',],
            ['name' => 'Евгений', 'surname' => 'Симонов', 'patronymic' => 'Артёмович', 'idRole' => '3', 'login' => 'mex2', 'password' => '123',],
        ]);

        DB::table('client')->insert([

            ['name' => 'Владислав', 'surname' => 'Сидоров', 'patronymic' => 'Артёмович', 'phone' => '89181541447',],
        ]);

        DB::table('workShift')->insert([

            ['date' => '27.01.2023', 'startTime' => '10:00', 'endTime' => '19:00', 'idStatusWorkShift' => '1',],
        ]);

        DB::table('workerForWorkShift')->insert([

            ['idWorkShift' => '1', 'idUser' => '2',],
            ['idWorkShift' => '1', 'idUser' => '3',],
        ]);

        DB::table('orderTicket')->insert([

            ['idWorkShift' => '1', 'idClient' => '1', 'idStatusOrder' => '1',],
        ]);

        DB::table('orderPoint')->insert([

            ['idOrderTicket' => '1', 'idWork' => '2', 'price' => '200', 'count' => '1',],
        ]);
        
    }
 }

