<?php

namespace App\Http\Controllers;

//use App\Http\controllers\Controller;
//use I1luminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request ;
//use I1luminate\support\Facades\Auth;

class AuthorizationController extends Controller
{
    public function create()
    {
        return view('authorization/login');
    }
   /* use AuthenticatesUsers;

    protected $redirectTo = '/home';
    protected $loginType;

    public function _construct()
    {
        $this->middleware('guest')->except('logout');
        $this->loginType = $this->checkLoginInput();
    }*/

    public function login(Request $request)
    {
        $this->validate($request, [
            'login' => 'required|string',
            'password' => 'required|string' 
        ]);

        $credentials = [
            $this->loginType => $request->login,
            'password' => $request->password
        ];

      /*  if (Auth::attempt($credentials)) {
            return redirect()->intended($this->redirectTo);
        }*/
            
        return redirect()->back()
            ->withInput()
            ->witherrors([
                'login' => 'These credentials don\'t match our records.'
            ]);
    }
        
    /*protected function checkLoginInput()
    {
        $inputData = request()->get('login');
        return filter_var($inputData, FILTER_VALIDATE_ EMAIL) ? 'email'
        
    }*/
}
