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

            ['role_name ' => 'Администратор', 'description' => 'Функционал администратора:
                                                                • Регистрация новых пользователей в системе;
                                                                • Создание/открытие/закрытие смен;
                                                                • Назначение/снятие работников со смены;
                                                                • Просмотр всех заказов определенной смены;
                                                                • Увольнение работников.',],
        
        [
            'role_name ' => 'Приёмщик машин', 'description' => 'Функционал приемщика машин:
                                                                • Создание нового заказа;
                                                                • Добавление/удаление работИмя из заказа;
                                                                • Просмотр всех принятых им заказов за смену;
                                                                • Изменение статуса заказа на «оплачен».',],
        
        [
            'role_name ' => 'Автослесарь', 'description' => 'Функционал автослесаря:
                                                            • Просмотр заказов, принятых от клиентов;
                                                            • Изменение статуса заказа на «выполняется» и «выполнен».',],
        ]);
    }
}
