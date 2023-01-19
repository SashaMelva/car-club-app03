<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class DatabaseSeeder extends Seeder
{
    
    public function run()
    {
        DB::table('role')->insert([

            ['role_name ' => 'Администратор', 'description' => 'Функционал администратора:
                                                                • Регистрация новых пользователей в системе;
                                                                • Создание/открытие/закрытие смен;
                                                                ',],
        
        [
            'role_name ' => 'Приёмщик машин', 'description' => 'Функционал приемщика машин:
                                                                • Создание нового заказа;
                                                                • Добавление/удаление работИмя из заказа',],
        
        [
            'role_name ' => 'Автослесарь', 'description' => 'Функционал автослесаря:
                                                            • Просмотр заказов, принятых от клиентов;
                                                            • Изменение статуса заказа на «выполняется» и «выполнен».',],
        ]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
