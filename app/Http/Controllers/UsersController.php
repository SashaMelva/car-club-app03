<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\Users;
use App\Models\Role;

class UsersController extends Controller
{
    /**
 * Store a new blog post.
 *
 * @param  \App\Http\Requests\StorePostRequest  $request
 * @return Illuminate\Http\Response
 */
    public function allUsers() {
        return view('role/admin/users', ['usersData' => Users::all()], ['rolesData' => Role::all()]);
    } 

    public function create() {
        return view('role/admin/newUser', ['rolesData' => Role::all()]);
    }

    

    public function store(UsersRequest $request) {
        $user = new Users();

        $user->name = $request->input('name');
        $user->surname = $request->input('surname');
        $user->patronymic = $request->input('patronymic');
        //$user->phone = $request->input('phone');
        $user->login = $request->input('login');
        $user->password = $request->input('password');
        //$user->category = $request->

        $user->save();

        return redirect()->route('adminUsers');
    }

    public function delet($id) {
        Users::find($id)->delete();
        return view('role/admin/users', ['usersData' => Users::all()]);
    }
    public function profil($id) {
        $user = new Users();
        return view('role/admin/profileUser', ['userseData' => $user->find($id)]);
    }
}
