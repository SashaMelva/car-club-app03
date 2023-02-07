<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UsersRequest;
use App\Models\Userr;
use App\Models\Role;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    /** 
 * Store a new blog post.
 *
 * @param  \App\Http\Requests\StorePostRequest  $request
 * @return Illuminate\Http\Response
 */
    public function allUsers() {
        $usersData = DB::table('userr')->join('roles', 'userr.idRole', '=', 'roles.id')->get();
        return view('role/admin/users', ['usersData' => $usersData]);
    } 

    public function create() {
        return view('role/admin/newUser', ['rolesData' => Role::all()]);
    }

    

    public function store(UsersRequest $request) {
        $user = new Userr();

        $user->name = $request->input('name');
        $user->surname = $request->input('surname');
        $user->patronymic = $request->input('patronymic');
        //$user->phone = $request->input('phone');
        $user->login = $request->input('login');
        $user->password = $request->input('password');
        //$user->category = $request->

        $user->save();

        return redirect()->route('adminUsers')->with("Клиет успешно создан");
    }

    public function delet($id) {
        Users::find($id)->delete();
        return view('role/admin/users', ['usersData' => Userr::all()]);
    }
    public function profil($id) {
        $user = new Userr();
        return view('role/admin/profileUser', ['userseData' => $user->find($id)]);
    }
}
