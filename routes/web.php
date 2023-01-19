<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthorizationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('index');
});*/
Route::get('/', function () {
    return view('layuot/home');
}) -> name('home');

Route::get('/login', [AuthorizationController::class, 'create']) -> name('login');

Route::post('/authorization', [AuthorizationController::class, 'login']) -> name('auth-user');


//Admin router
/*Route::get('/admin/home', function () {
    return view('role/admin/Admin');
}) -> name('adminHome');*/

Route::get('/avtoclub/users', function () {
    return view('role/admin/users');
}) -> name('adminUsers');

Route::get('/avtoclub/new_user', function () {
    return view('role/admin/newUser');
}) -> name('adminNewUser');

Route::get('/avtoclub/work_shift', function () {
    return view('role/admin/workShift');
}) -> name('adminWorkShift');

Route::get('/avtoclub/profile', function () {
    return view('role/admin/profileUser');
}) -> name('profile');
/*Route::get('/avtoclub/new_shift', function () {
    return view('role/admin/NewUser');
}) -> name('adminNewUser');*/

Route::get('/avtoclub/order', function () {
    return view('role/admin/order');
}) -> name('adminOrder');

Route::get('/user/{id}', [UserController::class, 'show']);
//Mechanic router
Route::get('/mechanic/home', function () {
    return view('role/mechanic/Mechanic');
}) -> name('mechanicHome');

//Receivers router
Route::get('/receivers/order', function () {
    return view('role/receivers/order');
}) -> name('order');

Route::get('/receivers/new_order', function () {
    return view('role/receivers/newOrder');
}) -> name('newOrder');

Route::get('/receivers/clients', function () {
    return view('role/receivers/client');
}) -> name('client');


Route::get('/new_client', [ClientController::class, 'create']) -> name('newClient');

Route::post('/client_add', [ClientController::class, 'clientAdd']) -> name('newClientAdd');